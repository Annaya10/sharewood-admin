@extends('layouts.adminlayout')
@section('page_meta')
<meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
<meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
<meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
<title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
@if (request()->segment(3) == 'edit' || request()->segment(3) == 'add')
{!!breadcrumb($row->first()->mem_type == '1' ? 'Add/Update Boosters' : 'Add/Update Users')!!}
<form class="form theme-form" method="post" action="" enctype="multipart/form-data"
    id="saveForm">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">


                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">

                           

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="mem_fullname" value="{{!empty($row->mem_fullname) ? $row->mem_fullname : ""}}">
                            </div>
                            <div class="mb-3">
                                <label for="city_name" class="form-label">Email</label>
                                <input type="text" class="form-control" name="mem_email" value="{{!empty($row->mem_email) ? $row->mem_email : ""}}">
                            </div>

                            <div class="mb-3">
                                <label for="office_name" class="form-label">Verification</label>
                                <select class="form-select" aria-label="Default select example" name="mem_verified">
    <option disabled selected>Select Status</option>
    <option value="1" {{ isset($row) && $row->mem_verified == 1 ? 'selected' : '' }}>Approved</option>
    <option value="2" {{ isset($row) && $row->mem_verified == 2 ? 'selected' : '' }}>Denied</option>
    <option value="3" {{ isset($row) && $row->mem_verified == 3 ? 'selected' : '' }}>Cancelled</option>
</select>

                                
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch py-2">
                                    <input class="form-check-input success" type="checkbox" id="color-success" {{ !empty($row) ? ($row->mem_status == 1 ? 'checked' : '') : '' }} name="mem_status" />
                                    <label class="form-check-label" for="color-success"> {{ !empty($row) ? ($row->mem_status == 0 ? 'InActive' : 'Active') : 'Status' }}</label>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                
                <div class=" col-12">
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@else
{!! breadcrumb($rows->first()->mem_type == '1' ? 'Manage Boosters' : 'Manage Users') !!}

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
                            <th>Status</th>
                            <th>Verification</th>
                            <th>Action</th>
                        </tr>
                        <!-- end row -->
                    </thead>
                    <tbody>
                        @if (!empty($rows))
                        @foreach ($rows as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{!! $row->mem_fullname !!}</td>
                            <td>{!! $row->mem_email !!}</td>

                            <td>{!! getStatus($row->mem_status) !!}</td>
                            <td>{!! getApproveStatus($row->mem_verified) !!}</td>

                            <td>
                                <div class="dropdown dropstart">
                                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical fs-6"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
    <a class="dropdown-item d-flex align-items-center gap-3" 
       href="{{ url(($rows->first()->mem_type == '1' ? 'admin/manage-boosters/edit/' : 'admin/manage-users/edit/') . $row->id) }}">
        <i class="fs-4 ti ti-edit"></i>Edit
    </a>
</li>
<li>
    <a class="dropdown-item d-flex align-items-center gap-3" 
    href="{{ url(($rows->first()->mem_type == '1' ? 'admin/manage-boosters/delete/' : 'admin/manage-users/delete/') . $row->id) }}"
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
                        <tr class="odd">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dragger = document.getElementById('dragger');
        const mapImage = document.getElementById('map-image');
        const mapContainer = document.getElementById('map-container');
        const hiddenTop = document.getElementById('top_pos');
        const hiddenLeft = document.getElementById('left_pos');
        let isDragging = false;

        // Function to set initial values in hidden inputs
        const setInitialValues = () => {
            const containerRect = mapContainer.getBoundingClientRect();
            const imageRect = mapImage.getBoundingClientRect();
            const draggerRect = dragger.getBoundingClientRect();

            const initialLeft = (((draggerRect.left - imageRect.left) / imageRect.width) * 100).toFixed(2);
            const initialTop = (((draggerRect.top - imageRect.top) / imageRect.height) * 100).toFixed(2);

            hiddenLeft.value = initialLeft;
            hiddenTop.value = initialTop;
        };

        // Set initial values on page load
        setInitialValues();

        dragger.addEventListener('mousedown', (event) => {
            isDragging = true;
            const containerRect = mapContainer.getBoundingClientRect();
            const imageRect = mapImage.getBoundingClientRect();
            const onMouseMove = (event) => {
                if (!isDragging) return;
                // Calculate new position relative to container
                let newLeft = event.clientX - containerRect.left - dragger.offsetWidth / 2;
                let newTop = event.clientY - containerRect.top - dragger.offsetHeight / 2;
                // Keep the dragger within map image boundaries
                newLeft = Math.max(imageRect.left - containerRect.left, Math.min(newLeft, imageRect.right - containerRect.left - dragger.offsetWidth));
                newTop = Math.max(imageRect.top - containerRect.top, Math.min(newTop, imageRect.bottom - containerRect.top - dragger.offsetHeight));
                // Apply new positions
                dragger.style.left = newLeft + 'px';
                dragger.style.top = newTop + 'px';
                // Update hidden inputs with percentage positions
                hiddenLeft.value = (((newLeft - (imageRect.left - containerRect.left)) / imageRect.width) * 100).toFixed(2);
                hiddenTop.value = (((newTop - (imageRect.top - containerRect.top)) / imageRect.height) * 100).toFixed(2);
            };
            const onMouseUp = () => {
                isDragging = false;
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
            };
            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });

        dragger.addEventListener('dragstart', () => false); // Prevent native drag behavior
    });
</script>