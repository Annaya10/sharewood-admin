@extends('layouts.adminlogin')

@section('page_meta')
<meta name="description" content="{{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
<meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
<meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Forgot Password' }}">
<title>Forgot Password - {{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Forgot Password' }}</title>
@endsection

@section('page_content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
        class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ url('admin/login') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img class="for-light"
                                    src="{{ !empty($site_settings) ? get_site_image_src('images', $site_settings->site_logo) : get_site_image_src('images', '') }}" alt="{{ !empty($site_settings) ? $site_settings->site_name : 'Forgot Password' }}">
                            </a>
                            <p class="text-center">{{ !empty($site_settings) ? $site_settings->site_name : 'Forgot Password' }}</p>
                            <form class="theme-form" action="{{ route('admin.send_reset_link') }}" method="post">
                                @csrf
                                {!! showMessage() !!}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Enter Your Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email address"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Send Reset Link</button>
                            </form>
                            <div class="text-center">
                                <a href="{{ url('admin/login') }}">Back to Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection