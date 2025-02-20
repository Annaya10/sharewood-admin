<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Permissions_admin_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Index extends Controller
{
    // private $data=array();
    public function __construct()
    {
        // $this->middleware(['guest']);
        $this->data['site_settings'] = $this->getSiteSettings();
    }
    public function register()
    {
        return view('admin.register', $this->data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'site_username' => 'required',
            'site_password' => 'required',
        ]);
        Admin::create([
            'site_username' => $request->site_username,
            'site_password' => Hash::make($request->site_password),
        ]);
        // auth()->attempt($request->only('site_username','site_password'));
        return redirect("admin/login");
    }
    public function admin_login()
    {
        return view('admin.login', $this->data);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'site_username' => 'required',
            'site_password' => 'required',
        ]);
        $admin = Admin::where('site_username', '=', $request->site_username)->first();
        if (!$admin) {
            return back()
                ->with('error', 'Username does not exist.');
        } else {
            if (Hash::check($request->site_password, $admin->site_password)) {
                if ($admin->id) {
                    $permissions = Permissions_admin_model::select(DB::raw('GROUP_CONCAT(permission_id) as perms'))->where('admin_id', $admin->id)
                        ->get()->first();
                    if ($admin->site_status == 0) {
                        return redirect('admin/login')
                            ->with('error', 'Please contact administrator to activate your account!');
                    }
                    if ($admin->site_admin_type != 'admin' && (empty($permissions) || $permissions->perms == '')) {
                        return redirect('admin/login')
                            ->with('error', 'Insufficient permissions, please contact administrator!');
                    }
                    $request->session()->put('admin_type', $admin->site_admin_type);
                    $request->session()->put('PropertyLoginId', $admin->id);
                    if (!empty($permissions) && !empty($permissions->perms)) {
                        $request->session()->put('permissions', explode(",", $permissions->perms));
                    }

                    return redirect('admin/dashboard');
                } else {
                    return redirect('admin/login');
                }
            } else {
                return redirect('admin/login')
                    ->with('error', 'Password is not correct!');
            }
        }
    }
    public function logout()
    {
        if (Session()->has("PropertyLoginId")) {
            Session::pull('PropertyLoginId');
            return redirect("admin/login");
        }
        // auth()->logout();

    }


    // //////jan 15//////////////////

    public function forgot_password()
    {
        return view('admin.forgot_password');
    }


    public function send_reset_link(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admin,site_admin_email',
        ]);

        $token = Str::random(64);

        // Update the token for the existing email in the `admin` table
        DB::table('admin')
            ->where('site_admin_email', $request->email)
            ->update([
                'token' => $token,
                'updated_at' => now(),
            ]);

        $resetLink = url('admin/reset-password/' . $token);

        // Prepare email data for the template
        $email_data = [
            'email_from' => 'no-reply@herosolutions.com.pk', // Sender's email
            'email_from_name' => 'Amphenol Tecvox', // Sender's name
            'email_to' => $request->email, // Recipient's email
            'email_to_name' => 'Admin', // Recipient's name
            'subject' => 'Password Reset Request', // Email subject
            'link' => $resetLink, // Reset link for the email template

        ];

        // Send email using your custom send_email function
        if (send_email($email_data, 'forgot')) { // Ensure the template name matches your view file
            return redirect()->back()->with('success', 'A password reset link has been sent to your email.');
        } else {
            return redirect()->back()->with('error', 'Failed to send the password reset link. Please try again.');
        }
    }



    public function showResetPasswordForm($token)
    {
        $admin = DB::table('admin')->where('token', $token)->first();

        if (!$admin) {
            return redirect()->route('login')->with('error', 'Invalid or expired reset link.');
        }

        return view('admin.reset_password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $input = $request->all();

        $admin = DB::table('admin')->where('token', $input['token'])->first();

        if (!$admin) {
            return redirect()->route('login')->with('error', 'Invalid or expired reset link.');
        }

        // pr($request);
        // Update the password and invalidate the token
        DB::table('admin')
            ->where('site_admin_email', $admin->site_admin_email)
            ->update([
                'site_password' => Hash::make($input['password']),
                'token' => null, // Invalidate the token
                'updated_at' => now(),
            ]);


        return redirect('admin/login')->with('success', 'Your password has been reset successfully.');
        // return redirect('admin/login');
    }


    // /////////////////////
}
