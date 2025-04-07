@extends('layouts.adminlayout')
@section('page_meta')
<meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
<meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
<meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
<title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
@if (request()->segment(3) == 'view')
{!! breadcrumb('View Message') !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border shadow-none">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-3">Booking Request Details</h4>
                        <div class="d-flex align-items-center justify-content-between pb-7">
                            <!-- Optional header information if needed -->
                        </div>

                        <!-- Name -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Name</h5>
                            </div>
                            <p class="mb-0">{{ $row->first_name }} {{ $row->last_name }}</p>
                        </div>

                        <!-- Email -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Email</h5>
                            </div>
                            <p class="mb-0">{{ $row->email }}</p>
                        </div>

                        <!-- Phone -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Phone</h5>
                            </div>
                            <p class="mb-0">{{ $row->phone_number }}</p>
                        </div>

                        <!-- Postal Code -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Postal Code</h5>
                            </div>
                            <p class="mb-0">{{ $row->postal_code }}</p>
                        </div>

                        <!-- State / Province -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">State/Province</h5>
                            </div>
                            <p class="mb-0">{{ $row->state_province }}</p>
                        </div>

                        <!-- Contact Method -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Preferred Contact Method</h5>
                            </div>
                            <p class="mb-0">{{ $row->contact_method }}</p>
                        </div>

                        <!-- Arrival Date -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Arrival Date</h5>
                            </div>
                            <p class="mb-0">{{ $row->arrival_date }}</p>
                        </div>

                        <!-- Departure Date -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Departure Date</h5>
                            </div>
                            <p class="mb-0">{{ $row->departure_date }}</p>
                        </div>

                        <!-- Guests -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Number of Guests</h5>
                            </div>
                            <p class="mb-0">{{ $row->guests }}</p>
                        </div>

                        <!-- Airport Pickup -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Airport Pickup</h5>
                            </div>
                            <p class="mb-0">{{ $row->airport_pickup }}</p>
                        </div>

                        <!-- Rooms -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Number of Rooms</h5>
                            </div>
                            <p class="mb-0">{{ $row->rooms }}</p>
                        </div>

                        <!-- Room Type -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Room Type</h5>
                            </div>
                            <p class="mb-0">{{ $row->room_type }}</p>
                        </div>

                        <!-- Accommodation Preferences -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Accommodation Preferences</h5>
                            </div>
                            <p class="mb-0">{{ $row->accommodation_preferences }}</p>
                        </div>

                        <!-- Rounds -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Number of Rounds</h5>
                            </div>
                            <p class="mb-0">{{ $row->rounds }}</p>
                        </div>

                        <!-- Courses -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Courses</h5>
                            </div>
                            <p class="mb-0">
                                @foreach(json_decode($row->courses) as $course)
                                {{ $course }}@if(!$loop->last), @endif
                                @endforeach
                            </p>
                        </div>

                        <!-- Golf Time -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Golf Time</h5>
                            </div>
                            <p class="mb-0">{{ $row->golf_time }}</p>
                        </div>

                        <!-- Tee Time Preferences -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Tee Time Preferences</h5>
                            </div>
                            <p class="mb-0">{{ $row->tee_time_preferences }}</p>
                        </div>

                        <!-- Hear About Us -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">How Did You Hear About Us?</h5>
                            </div>
                            <p class="mb-0">{{ $row->hear_about_us }}</p>
                        </div>

                        <!-- Special Occasion -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Special Occasion</h5>
                            </div>
                            <p class="mb-0">{{ $row->special_occasion }}</p>
                        </div>

                        <!-- Consent -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Consent</h5>
                            </div>
                            <p class="mb-0">{{ $row->consent == 1 ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@else
{!! breadcrumb('Booking Requests') !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                    <thead>
                        <!-- start row -->
                        <tr>
                            <th>Sr#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <!-- end row -->
                    </thead>
                    <tbody>
                        @if (!empty($rows))
                        @foreach ($rows as $key => $row)
                        <tr>
                            <td class="sorting_1">{{ $key + 1 }}</td>
                            <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone_number }}</td>
                            <td>{!! getReadStatus($row->status) !!}</td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical fs-6"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                href="{{ url('admin/booking/view/' . $row->id) }}">
                                                <i class="fs-4 ti ti-eye"></i>View
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                href="{{ url('admin/booking/delete/' . $row->id) }}"
                                                onclick="return confirm('Are you sure?');">
                                                <i class="fs-4 ti ti-trash"></i>Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">No record(s) found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection