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
                        <h4 class="card-title mb-3">Reservation Request Details</h4>
                        <div class="d-flex align-items-center justify-content-between pb-7">
                            <!-- Optional header information if needed -->
                        </div>

                        <!-- Name -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Name</h5>
                            </div>
                            <p class="mb-0">{{ $row->name }} </p>
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
                            <p class="mb-0">{{ $row->phone }}</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Company Name</h5>
                            </div>
                            <p class="mb-0">{{ $row->company }}</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Event Type</h5>
                            </div>
                            <p class="mb-0">{{ $row->event_type }}</p>
                        </div>

                        
                        <!-- Arrival Date -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0"> Date Time</h5>
                            </div>
                            <p class="mb-0">{{ \Carbon\Carbon::parse($row->booking_time)->format('d M Y, h:i A') }}
                            </p>
                        </div>

                        <!-- Departure Date -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Players</h5>
                            </div>
                            <p class="mb-0">{{ $row->players }}</p>
                        </div>

                        <!-- Guests -->
                        <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                                <h5 class="fs-4 fw-semibold mb-0">Package</h5>
                            </div>
                            <p class="mb-0">{{ $row->package }}</p>
                        </div>

                       



                        <!-- Courses -->
                        @php
    $decoded = json_decode($row->services, true); 
    $services = is_string($decoded) ? json_decode($decoded, true) : $decoded;
@endphp

<div class="d-flex align-items-center justify-content-between py-3 border-top">
    <div>
        <h5 class="fs-4 fw-semibold mb-0">Services</h5>
    </div>
    <p class="mb-0">
        @if(is_array($services))
            @foreach($services as $service)
                {{ $service }}@if(!$loop->last), @endif
            @endforeach
        @else
            N/A
        @endif
    </p>
</div>


                       
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@else
{!! breadcrumb('Reservation Requests') !!}
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
                            <td>{{ $row->name }} </td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
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
                                                href="{{ url('admin/reservation/view/' . $row->id) }}">
                                                <i class="fs-4 ti ti-eye"></i>View
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                href="{{ url('admin/reservation/delete/' . $row->id) }}"
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