@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('Website Pages')!!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">  
                <table class="table table-bordered text-nowrap align-middle dataTable basic-datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Page Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td width="65%">Home</td>
                            <td>
                                <a href="{{ url('admin/pages/home') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td width="65%">About</td>
                            <td>
                                <a href="{{ url('admin/pages/about') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td width="65%">ProShop & Boutique</td>
                            <td>
                                <a href="{{ url('admin/pages/proshop-boutique') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td width="65%">Hospitality Group & Commitments</td>
                            <td>
                                <a href="{{ url('admin/pages/hospitality-group-commitments') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td width="65%">Course Overview</td>
                            <td>
                                <a href="{{ url('admin/pages/courses') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td width="65%">Green Fee Rates</td>
                            <td>
                                <a href="{{ url('admin/pages/rates') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td width="65%">Course Guide & Scorecard</td>
                            <td>
                                <a href="{{ url('admin/pages/course-guide-scorecard') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        
                        <tr>
                            <td>8</td>
                            <td width="65%">Corporate Retreats & Meetings</td>
                            <td>
                                <a href="{{ url('admin/pages/corporate-retreats-meetings') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        <tr>
                            <td>9</td>
                            <td width="65%">Tournaments</td>
                            <td>
                                <a href="{{ url('admin/pages/tournaments') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        <tr>
                            <td>10</td>
                            <td width="65%">Weddings</td>
                            <td>
                                <a href="{{ url('admin/pages/wedding-at-sherwood-golf') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        
                        <tr>
                            <td>11</td>
                            <td width="65%">Memberships Overview</td>
                            <td>
                                <a href="{{ url('admin/pages/memberships-overview') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                         
                        <tr>
                            <td>12</td>
                            <td width="65%">Memberships Application</td>
                            <td>
                                <a href="{{ url('admin/pages/memberships-application') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                    

                        <tr>
                            <td>13</td>
                            <td width="65%">Accommodations</td>
                            <td>
                                <a href="{{ url('admin/pages/accommodations') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        <tr>
                            <td>14</td>
                            <td width="65%">Stay & Play Packages and Specials</td>
                            <td>
                                <a href="{{ url('admin/pages/stay-play-packages') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td width="65%">Booking Requests</td>
                            <td>
                                <a href="{{ url('admin/pages/booking-requests') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>

                        <tr>
                            <td>16</td>
                            <td width="65%">Reviews</td>
                            <td>
                                <a href="{{ url('admin/pages/reviews') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td width="65%">Privacy Policy</td>
                            <td>
                                <a href="{{ url('admin/pages/privacy_policy') }}" class="btn btn-primary active">Edit
                                    Page</a>
                            </td>
                        </tr>
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    @endsection
