@extends('layouts.adminlayout')
@section('page_meta')
<meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
<meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
<meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
<title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('Courses')!!}
<form class="form theme-form" method="post" action="" enctype="multipart/form-data"
    id="saveForm">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="row">
                    <div class="col">
                        <div>
                            <label class="form-label" for="page_title">Page Title</label>
                            <input class="form-control" id="page_title" type="text" name="page_title"
                                placeholder="" value="{{ !empty($sitecontent['page_title']) ? $sitecontent['page_title'] : "" }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label class="form-label" for="meta_title">Meta Title</label>
                            <input class="form-control" id="meta_title" type="text" name="meta_title"
                                placeholder="" value="{{ !empty($sitecontent['meta_title']) ? $sitecontent['meta_title'] : "" }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label class="form-label" for="site_meta_desc">Meta Description</label>
                            <textarea class="form-control" id="meta_description" rows="3" name="meta_description">{{ !empty($sitecontent['meta_description']) ? $sitecontent['meta_description'] : "" }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label class="form-label" for="meta_keywords">Meta Keywords</label>
                            <textarea class="form-control" id="meta_keywords" rows="3" name="meta_keywords">{{ !empty($sitecontent['meta_keywords']) ? $sitecontent['meta_keywords'] : "" }}</textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card">

        <div class="card-header">
            <h5>Banner</h5>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="file_choose_icon">
                                    <img src="{{ get_site_image_src('images', !empty($sitecontent['image1']) ? $sitecontent['image1'] : "") }}" alt="matdash-img" class="img-fluid ">
                                </div>
                                <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                <input class="form-control uploadFile" name="image1" type="file"
                                    data-bs-original-title="" title="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="overview_heading">Heading</label>
                                <input class="form-control" id="overview_heading" type="text"
                                    name="overview_heading" placeholder=""
                                    value="{{ !empty($sitecontent['overview_heading']) ? $sitecontent['overview_heading'] : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>


    <div class="card">

    <div class="card-header">
        <h5>Section 1</h5>
    </div>

    <div class="card-body">

        <div class="row">
          

            <div class="col-md-12">
                <div class="row">
                
                  

                    <div class="row">
               
            </div>



                    <?php $section3_block_count = 0; ?>
            @for ($i = 2; $i <= 6; $i++)
                <?php $section3_block_count = $section3_block_count + 1; ?>
                <div class="col-4">
                    <div class="card">

                        <div class="card-header">
                            <h5>Count {{ $section3_block_count }}</h5>
                        </div>
                    
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="sec3_heading{{ $i }}">Heading
                                            {{ $section3_block_count }}</label>
                                        <input class="form-control"
                                            id="sec3_heading{{ $i }}" type="text"
                                            name="sec3_heading{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec3_heading' . $i]) ? $sitecontent['sec3_heading' . $i] : "" }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label class="form-label"
                                            for="sec3_text{{ $i }}">Text
                                            {{ $section3_block_count }}</label>

                                            <input class="form-control"
                                            id="sec3_text{{ $i }}" type="text"
                                            name="sec3_text{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec3_text' . $i]) ? $sitecontent['sec3_text' . $i] : "" }}">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor


                
                </div>
            </div>

        </div>
    </div>


</div>

<div class="card">

<div class="card-header">
    <h5>Section 2</h5>
</div>

<div class="card-body">

<div class="row">
<div class="col">
<div class="card w-100 border position-relative overflow-hidden">
    <div class="card-body p-4">
        <div class="text-center">
            <div class="file_choose_icon">
                <img src="{{ get_site_image_src('images', !empty($sitecontent['image5']) ? $sitecontent['image5'] : '') }}" alt="matdash-img" class="img-fluid ">
            </div>
            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            <input class="form-control uploadFile" name="image5" type="file"
                data-bs-original-title="" title="">
        </div>
    </div>
    <div class="card-body p-4">
        <div class="text-center">
            <div class="file_choose_icon">
                <img src="{{ get_site_image_src('images', !empty($sitecontent['image7']) ? $sitecontent['image7'] : '') }}" alt="matdash-img" class="img-fluid ">
            </div>
            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            <input class="form-control uploadFile" name="image7" type="file"
                data-bs-original-title="" title="">
        </div>
    </div>
</div>
</div>

<div class="col-md-8">
<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label" for="section4_heading"> Heading</label>
            <input class="form-control" id="section4_heading" type="text"
                name="section4_heading" placeholder=""
                value="{{ !empty($sitecontent['section4_heading']) ? $sitecontent['section4_heading'] : '' }}">
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label" for="section4_text"> Text</label>
            <textarea id="section4_text" name="section4_text" rows="4" class="editor">{{ !empty($sitecontent['section4_text']) ? $sitecontent['section4_text'] : "" }}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-2">
                <label class="form-label" for="section4_link_text">Link Text</label>
                <input class="form-control" id="section4_link_text" type="text"
                    name="section4_link_text" placeholder=""
                    value="{{ !empty($sitecontent['section4_link_text']) ? $sitecontent['section4_link_text'] : "" }}">
            </div>
        </div>
        <div class="col">
            <div class="mb-2">
                <label class="form-label" for="section4_link_url">Link URL</label>
                <select name="section4_link_url" class="form-control" required>
                    @foreach ($all_pages as $key => $page)
                    <option value="{{ $key }}"
                        {{ !empty($sitecontent['section4_link_url']) && $sitecontent['section4_link_url'] == $key ? 'selected' : '' }}>
                        {{ $page }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>

</div>
    <div class="card">
        <div class="card-header">
            <h5>Section 3 </h5>
        </div>
        <div class="card-body">

        <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section2_top_heading">Heading</label>
                        <input class="form-control" id="section2_top_heading" type="text"
                            name="section2_top_heading" placeholder=""
                            value="{{ !empty($sitecontent['section2_top_heading']) ? $sitecontent['section2_top_heading'] : '' }}">
                    </div>
                </div>
              

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section2_text">Text</label>
                        <textarea id="section2_text" name="section2_text" rows="5" class=" editor">{{ !empty($sitecontent['section2_text']) ? $sitecontent['section2_text'] : "" }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label class="form-label" for="section2_link_text">Link Text</label>
                        <input class="form-control" id="section2_link_text" type="text"
                            name="section2_link_text" placeholder=""
                            value="{{ !empty($sitecontent['section2_link_text']) ? $sitecontent['section2_link_text'] : "" }}">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label class="form-label" for="section2_link_url">Link URL</label>
                        <select name="section2_link_url" class="form-control" required>
                            @foreach ($all_pages as $key => $page)
                            <option value="{{ $key }}"
                                {{ !empty($sitecontent['section2_link_url']) && $sitecontent['section2_link_url'] == $key ? 'selected' : '' }}>
                                {{ $page }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label class="form-label" for="section2_link_text2">Link Text</label>
                        <input class="form-control" id="section2_link_text2" type="text"
                            name="section2_link_text2" placeholder=""
                            value="{{ !empty($sitecontent['section2_link_text2']) ? $sitecontent['section2_link_text2'] : "" }}">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2">
                        <label class="form-label" for="section2_link_url2">Link URL</label>
                        <select name="section2_link_url2" class="form-control" required>
                            @foreach ($all_pages as $key => $page)
                            <option value="{{ $key }}"
                                {{ !empty($sitecontent['section2_link_url2']) && $sitecontent['section2_link_url2'] == $key ? 'selected' : '' }}>
                                {{ $page }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    </div>


   

    <div class="col-12">
        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
            <button class="btn btn-primary" type="submit">Update Page</button>
        </div>
    </div>
    @endsection