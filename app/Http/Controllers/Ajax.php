<?php

namespace App\Http\Controllers;


use Stripe\StripeClient;
use App\Models\Member_model;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use App\Models\Contact_model;
use App\Models\Newsletter_model;
use App\Models\Mem_id_verifications_model;
use App\Models\Booking;
use App\Models\EventBooking;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Storage;

use App\Models\Blog_model;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Ajax extends Controller
{
    public function upload_editor_image(Request $request)
    {
        // Validate the request
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the uploaded file
        $file = $request->file('upload');

        // Generate a unique filename
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

        // Store the file in the public directory (adjust the path as needed)
        $path = $file->storeAs('public/uploads', $filename);

        // Get the public URL of the stored file
        $url = asset('storage/uploads/' . $filename);

        // Return a JSON response with the URL
        return response()->json(['url' => $url]);
    }


    public function get_data()
    {
        pr(pr(env('STRIPE_TESTING_SECRET_KEY')));
        print_r(env('NODE_SOCKET'));
        print_r("hiii");
        $data = array(
            'mem_id' => 7,
            'name' => "Abida"
        );
        $notify = sendPostRequest('https://staging.rentaro.com.au:3002/receive-notification/', $data);
        pr($notify);
        $thumb = generateThumbnail('members', 'FItXGuMegirvYSESVGiyyLflo7llVdZMwMSqvgGi.png');
        pr(get_users_folder_random_image());
        // phpinfo();

    }

    public function get_blogs(Request $request)
    {

        // pr('asdasdasd');
        // Validate the incoming category_id
        $request->validate([
            'category_id' => 'required|integer|exists:blog_categories,id',
        ]);
        // pr($request);

        // Fetch blogs related to the requested category
        $blogs = Blog_model::where('category', $request->category_id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Return a partial view with the blogs
        return view('pages.blog_filter', compact('blogs'));
    }



    public function get_states($country_id)
    {
        $output = array();
        if ($country_id > 0 && $country_row = DB::table('countries')->where('id', $country_id)->first()) {
            $output = get_country_states($country_row->id);
        }

        exit(json_encode($output));
    }

    public function save_image(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $res = array();
        $res['status'] = 0;
        if (!empty($member)) {
            $input = $request->all();
            if ($request->hasFile('image')) {

                $request_data = [
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ];
                $validator = Validator::make($input, $request_data);
                // json is null
                if ($validator->fails()) {
                    $res['status'] = 0;
                    $res['msg'] = 'Error >>' . $validator->errors()->first();
                } else {
                    $image = $request->file('image')->store('public/members/');
                    if (!empty(basename($image))) {
                        // generateThumbnail('members', basename($image), 'avatar', 'large');
                        $member_row = Member_model::find($member->id);
                        $member_row->mem_image = basename($image);
                        $member_row->update();
                        $res['status'] = 1;
                        $res['mem_image'] = basename($image);
                    } else {
                        $res['msg'] = "Something went wrong while uploading image. Please try again!";
                    }
                }
            } else {
                $res['image'] = "Only images are allowed to upload!";
            }
        } else {
            $res['status'] = 0;
            $res['msg'] = 'Something went wrong!';
        }
        exit(json_encode($res));
    }
    public function save_verification_uploads(Request $request)
    {
        $token = $request->input('token', null);
        $member = $this->authenticate_verify_token($token);
        $res = array();
        $res['status'] = 0;
        if (!empty($member) && $member != false) {
            $input = $request->all();
            if ($request->hasFile('image')) {

                $request_data = [
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ];
                $validator = Validator::make($input, $request_data);
                // json is null
                if ($validator->fails()) {
                    $res['status'] = 0;
                    $res['msg'] = 'Error >>' . $validator->errors()->first();
                } else {
                    $image = $request->file('image')->store('public/attachments/');
                    if (!empty(basename($image))) {
                        $data = array();
                        if ($input['type'] == 'selfie') {
                            $data['selfie'] = basename($image);
                        }
                        if ($input['type'] == 'cnic') {
                            $data['cnic'] = basename($image);
                        }
                        if ($input['type'] == 'cnic_selfie') {
                            $data['cnic_selfie'] = basename($image);
                        }
                        $id_verification_row = $member->id_verification($member->mem_id_verification_id);
                        if (!empty($id_verification_row) && $id_verification_row->status == 'in_progress') {
                            if (!empty($id_verification_row->cnic) && !empty($id_verification_row->selfie) && $input['type'] == 'cnic_selfie') {
                                $data['status'] = 'requested';
                            }
                            Mem_id_verifications_model::where('id', $id_verification_row->id)->update($data);
                        } else if (!empty($id_verification_row) && $id_verification_row->status == 'verified') {
                            $res['msg'] = "Your ID verification is already verified!";
                            exit(json_encode($res));
                        } else if (!empty($id_verification_row) && $id_verification_row->status == 'requested') {
                            $res['msg'] = "Your ID verification request has already been sent to admin for approval!";
                            exit(json_encode($res));
                        } else {
                            $data['mem_id'] = $member->id;
                            $data['status'] = 'in_progress';

                            $id = Mem_id_verifications_model::create($data);
                            $mem_id_verification_id = $id->id;
                            Member_model::where('id', $member->id)->update(array('mem_id_verification_id' => $mem_id_verification_id));
                        }
                        $memberRow = Member_model::where('id', $member->id)->get()->first();
                        $memberRow->id_verification = $memberRow->id_verification($memberRow->mem_id_verification_id);
                        $res['status'] = 1;
                        $res['memberRow'] = $memberRow;
                    } else {
                        $res['msg'] = "Something went wrong while uploading image. Please try again!";
                    }
                }
            } else {
                $res['image'] = "Only images are allowed to upload!";
            }
        } else {
            $res['status'] = 0;
            $res['msg'] = 'Something went wrong!';
        }
        exit(json_encode($res));
    }
    public function upload_image(Request $request)
    {
        $res = array();
        $res['status'] = 0;
        $input = $request->all();
        $res['input'] = $input;
        if ($request->hasFile('image')) {
            $type = $input['type'];
            $file_type = $request->input('file_type', null);
            $res['type'] = 'public/' . $type . '/';
            if ($file_type == 'files'):
                $request_data = [
                    'image' => 'max:40000'
                ];
            else:
                $request_data = [
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ];

            endif;
            $validator = Validator::make($input, $request_data);
            // json is null
            if ($validator->fails()) {
                $res['status'] = 0;
                $res['msg'] = 'Error >>' . $validator->errors()->first();
            } else {
                $uploadedFile = $request->file('image');
                $image = $request->file('image')->store('public/' . $type . '/');
                $filename = $uploadedFile->getClientOriginalName();
                $res['image'] = $image;
                if (!empty(basename($image))) {
                    // generateThumbnail($type, basename($image), 'square', 'large');
                    $res['status'] = 1;
                    $res['image_name'] = basename($image);
                    $res['file_name'] = $filename;
                    // $res['image_path']=storage_path('app/public/'.basename($image));
                } else {
                    $res['msg'] = "Something went wrong while uploading image. Please try again!";
                }
            }
        } else {
            $res['msg'] = "Only images are allowed to upload!";
        }

        exit(json_encode($res));
    }
    public function upload_file(Request $request)
    {
        $res = array();
        $res['status'] = 0;
        $input = $request->all();
        if ($request->hasFile('file')) {
            $request_data = [
                'file' => 'mimes:jpg,jpeg,pdf,docx|max:40000'
            ];
            $validator = Validator::make($input, $request_data);
            // json is null
            if ($validator->fails()) {
                $res['status'] = 0;
                $res['msg'] = 'Error >>' . $validator->errors()->first();
            } else {
                $image = $request->file('file')->store('public/attachments/');
                $res['file_name'] = $_FILES['file']['name'];
                $res['file'] = $image;
                if (!empty(basename($image))) {
                    $uploadedFile = $request->file('file');
                    $filename = $uploadedFile->getClientOriginalName();
                    $res['status'] = 1;
                    $res['file_name'] = basename($image);
                    $res['file_name_text'] = $filename;
                } else {
                    $res['msg'] = "Something went wrong while uploading file. Please try again!";
                }
            }
        } else {
            $res['msg'] = "No file selected!";
        }

        exit(json_encode($res));
    }

    public function upload_files(Request $request)
    {
        $res = array();
        $res['status'] = 0;
        $input = $request->all();

        // Check if files are uploaded
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $fileNames = []; // Array to store file names

            foreach ($files as $file) {
                $rules = [
                    'file' => 'mimes:jpg,jpeg,png,gif,webp,pdf,docx,mp3,mp4|max:40000'
                ];

                $validator = Validator::make(['file' => $file], $rules);

                if ($validator->fails()) {
                    $res['status'] = 0;
                    $res['msg'] = 'Error >>' . $validator->errors()->first();
                    return response()->json($res);
                } else {
                    // Store the file and get the name
                    $path = $file->store('public/attachments');
                    $fileNames[] = basename($path); // Extract and store only file name
                }
            }

            $res['status'] = 1;
            $res['file_names'] = $fileNames;
        } else {
            $res['msg'] = "No files selected!";
        }

        return response()->json($res);
    }



    public function newsletter(Request $request)
    {
        $res = array();
        $res['status'] = 0;
        $input = $request->all();
        if ($input) {
            $request_data = [
                'email' => 'required|email|unique:newsletter,email',
            ];
            $validator = Validator::make($input, $request_data);
            // json is null
            if ($validator->fails()) {
                $res['status'] = 0;
                $res['msg'] = 'Error >>' . $validator->errors()->first();
            } else {
                $data = array(
                    'email' => $input['email'],
                    'status' => 0
                );
                Newsletter_model::create($data);
                $res['status'] = 1;
                $res['msg'] = 'Subscribed successfully!';
            }
        }
        exit(json_encode($res));
    }
    public function eventBooking(Request $request)
    {
        $res = ['status' => 0];
        $input = $request->all();

        if ($input) {
            $request_data = [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'company' => 'nullable|string|max:255',
                'event_type' => 'required|string|max:100',
                'date_time' => 'required|string|max:100',
                'players' => 'required|integer',
                'package' => 'nullable|string|max:100',
                'services' => 'required|string|max:100', // At least one must be selected
            ];

            $validator = Validator::make($input, $request_data);

            if ($validator->fails()) {
                $res['status'] = 0;
                $res['msg'] = 'Error >> ' . $validator->errors()->first();
            } else {
                $data = [
                    'name' => $input['name'],
                    'phone' => $input['phone'],
                    'email' => $input['email'],
                    'company' => $input['company'] ?? null,
                    'event_type' => $input['event_type'],
                    'date_time' => $input['date_time'],
                    'players' => $input['players'],
                    'package' => $input['package'] ?? null,
                    'services' => json_encode($input['services']),
                ];

                EventBooking::create($data);

                $res['status'] = 1;
                $res['msg'] = 'Event booking submitted successfully!';
            }
        }

        return response()->json($res);
    }

    public function contact_us(Request $request)
    {

        $res = array();
        $res['status'] = 0;
        $input = $request->all();
        if ($input) {
            $request_data = [
                'email' => 'required|email',
                'fname' => 'required',
                'lname' => 'required',
                'phone' => 'required',
                'message' => 'required',
                'hear_about' => 'required',
                // 'services' => 'required',
            ];
            // $custom_messages = [
            //     'services.required' => 'Please select at least one service from the list.'
            // ];

            $validator = Validator::make($input, $request_data);
            // $validator = Validator::make($input, $request_data);
            // json is null
            if ($validator->fails()) {
                $res['status'] = 0;
                $res['msg'] = 'Error >>' . $validator->errors();
            } else {
                // $services = json_decode($input['services']);
                $data = array(
                    'name' => $input['fname'] . " " . $input['lname'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'message' => $input['message'],
                    'hear_about' => $input['hear_about'],
                    // 'services' => implode(",", $services),
                    'status' => 0
                );
                // pr($data);
                Contact_model::create($data);

                $emailData = [
                    'email_from' =>  $this->data['site_settings']->site_noreply_email,
                    'email_from_name' => $this->data['site_settings']->site_name,
                    'email_to' => $data['email'],
                    'email_to_name' => $data['name'],
                    'subject' => 'Your Query Received',
                    'content' => $data,
                ];

                $emailSent = send_email($emailData, 'contact');
                if ($emailSent) {
                    $res['status'] = 1;
                    $res['msg'] = 'Message sent successfully!';
                } else {
                    $res['status'] = 0;
                    $res['msg'] = 'Failed to send email.';
                }


                $res['status'] = 1;
                $res['msg'] = 'Message sent successfully!';
            }
        }
        exit(json_encode($res));
    }


    public function bookingRequest(Request $request)
    {
        $res = array();
        $res['status'] = 0;

        $input = $request->all();

        // Validation rules based on your form data
        if ($input) {
            $request_data = [
                'lookingToDo' => 'required|in:Stay Only,Stay & Play',
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|email',
                'phoneNumber' => 'required|string|max:20',
                'postalCode' => 'required|string|max:20',
                'stateProvince' => 'required|string|max:100',
                'contactMethod' => 'required|in:Email,Phone',
                'arrivalDate' => 'required|date',
                'departureDate' => 'required|date',
                'flexibleDates' => 'required|string|max:255',
                'guests' => 'required|integer',
                'airportPickup' => 'required|in:Yes,No',
                'rooms' => 'required|integer',
                'roomType' => 'required|string|max:255',
                'accommodationPreferences' => 'nullable|string|max:500',
                'rounds' => 'required|integer',
                'courses' => 'required|array',
                'golfTime' => 'required|in:Anytime,Morning,Afternoon,Twilight',
                'teeTimePreferences' => 'nullable|string|max:255',
                'hearAboutUs' => 'required|string|max:255',
                'specialOccasion' => 'nullable|string|max:255',
                'consent' => 'required|string|max:255',
            ];

            $validator = Validator::make($input, $request_data);

            if ($validator->fails()) {
                $res['status'] = 0;
                $res['msg'] = 'Validation errors: ' . $validator->errors()->first();
            } else {
                // Prepare the data for saving
                $data = [
                    'looking_to_do' => $input['lookingToDo'],
                    'first_name' => $input['firstName'],
                    'last_name' => $input['lastName'],
                    'email' => $input['email'],
                    'phone_number' => $input['phoneNumber'],
                    'postal_code' => $input['postalCode'],
                    'state_province' => $input['stateProvince'],
                    'contact_method' => $input['contactMethod'],
                    'arrival_date' => $input['arrivalDate'],
                    'departure_date' => $input['departureDate'],
                    'flexible_dates' => $input['flexibleDates'] == true ? 1 : 0,
                    'guests' => $input['guests'],
                    'airport_pickup' => $input['airportPickup'],
                    'rooms' => $input['rooms'],
                    'room_type' => $input['roomType'],
                    'accommodation_preferences' => $input['accommodationPreferences'] ?? null,
                    'rounds' => $input['rounds'],
                    'courses' => json_encode($input['courses']),
                    'golf_time' => $input['golfTime'],
                    'tee_time_preferences' => $input['teeTimePreferences'] ?? null,
                    'hear_about_us' => $input['hearAboutUs'],
                    'special_occasion' => $input['specialOccasion'] ?? null,
                    'consent' => $input['consent'] == true ? 1 : 0,
                ];

                $bookingRequest = Booking::create($data);

                if ($bookingRequest) {
                    // $emailData = [
                    //     'email_from' => $this->data['site_settings']->site_noreply_email,
                    //     'email_from_name' => $this->data['site_settings']->site_name,
                    //     'email_to' => $data['email'],
                    //     'email_to_name' => $data['first_name'] . ' ' . $data['last_name'],
                    //     'subject' => 'Your Booking Request Received',
                    //     'content' => $data,
                    // ];

                    // $emailSent = send_email($emailData, 'booking_confirmation');

                    // if ($emailSent) {
                    //     $res['status'] = 1;
                    //     $res['msg'] = 'Booking request sent successfully!';
                    // } else {
                    //     $res['status'] = 0;
                    //     $res['msg'] = 'Failed to send booking confirmation email.';
                    // }

                    $res['status'] = 1;
                    $res['msg'] = 'Booking request sent successfully!';
                } else {
                    $res['status'] = 0;
                    $res['msg'] = 'Failed to save your booking request.';
                }
            }
        }

        return response()->json($res);
    }
}
