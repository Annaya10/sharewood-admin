@extends('layouts.adminlayout')
@section('page_meta')
<meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
<meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
<meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
<title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('Tournaments')!!}
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
<div class="col">
<div class="card w-100 border position-relative overflow-hidden">
    <div class="card-body p-4">
        <div class="text-center">
            <div class="file_choose_icon">
                <img src="{{ get_site_image_src('images', !empty($sitecontent['image2']) ? $sitecontent['image2'] : '') }}" alt="matdash-img" class="img-fluid ">
            </div>
            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            <input class="form-control uploadFile" name="image2" type="file"
                data-bs-original-title="" title="">
        </div>
    </div>
    
</div>
</div>

<div class="col-md-8">
<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label" for="section1_heading"> Heading</label>
            <input class="form-control" id="section1_heading" type="text"
                name="section1_heading" placeholder=""
                value="{{ !empty($sitecontent['section1_heading']) ? $sitecontent['section1_heading'] : '' }}">
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label" for="section1_text"> Text</label>
            <textarea id="section1_text" name="section1_text" rows="4" class="editor">{{ !empty($sitecontent['section1_text']) ? $sitecontent['section1_text'] : "" }}</textarea>
        </div>
    </div>

    

  
</div>
</div>

</div>
</div>

</div>





    <div class="card">
        <div class="card-header">
            <h5>Section 2 </h5>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section3_top_heading">Heading</label>
                        <input class="form-control" id="section3_top_heading" type="text"
                            name="section3_top_heading" placeholder=""
                            value="{{ !empty($sitecontent['section3_top_heading']) ? $sitecontent['section3_top_heading'] : '' }}">
                    </div>
                </div>
              

            </div>
            
            
        <div class="row">

            

            <?php $how_block_count = 0; ?>

            @for ($i = 2; $i <= 4; $i++)
                <?php $how_block_count = $how_block_count + 1; ?>


                <div class="col-4">
                    <div class="card">

                        <div class="card-header">
                            <h5>Block {{ $how_block_count }}</h5>
                        </div>
                    
                        <div class="card-body">

                     
                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="sec1_heading{{ $i }}">Heading
                                            {{ $how_block_count }}</label>
                                        <input class="form-control"
                                            id="sec1_heading{{ $i }}" type="text"
                                            name="sec1_heading{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec1_heading' . $i]) ? $sitecontent['sec1_heading' . $i] : "" }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label"
                                    for="sec1_text{{ $i }}">Text
                                    {{ $how_block_count }}</label>
                                <textarea id="sec1_text{{ $i }}" name="sec1_text{{ $i }}" rows="4"
                                    class="form-control">{{ !empty($sitecontent['sec1_text' . $i]) ? $sitecontent['sec1_text' . $i] : "" }}</textarea>
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

    <!-- <div class="card">

<div class="card-header">
    <h5>Section 3</h5>
</div>

<div class="card-body">

    <div class="row">
        <div class="col">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="file_choose_icon">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image3']) ? $sitecontent['image3'] : "") }}" alt="matdash-img" class="img-fluid ">
                        </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image3" type="file"
                            data-bs-original-title="" title="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section3_heading"> Heading</label>
                        <input class="form-control" id="section3_heading" type="text"
                            name="section3_heading" placeholder=""
                            value="{{ !empty($sitecontent['section3_heading']) ? $sitecontent['section3_heading'] : '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section3_text"> Text</label>
                        <textarea id="section3_text" name="section3_text" rows="4" class="editor">{{ !empty($sitecontent['section3_text']) ? $sitecontent['section3_text'] : "" }}</textarea>
                    </div>
                </div>

                  
            </div>
            <div class="row">
                    @for ($i = 1; $i < 2; $i++)
                        <div class="col">
                        <div class="mb-4">
                            <label class="form-label" for="banner_link_text_sec3{{ $i }}">Link Text {{ $i }}</label>
                            <input class="form-control" id="banner_link_text_sec3{{ $i }}" type="text"
                                name="banner_link_text_sec3{{ $i }}" placeholder=""
                                value="{{ !empty($sitecontent['banner_link_text_sec3' . $i]) ? $sitecontent['banner_link_text_sec3' . $i] : '' }}">
                        </div>
                </div>
                <div class="col">
                    <div class="mb-4">
                        <label class="form-label" for="banner_link_url_sec3{{ $i }}">Link URL {{ $i }}</label>
                        <select name="banner_link_url_sec3{{ $i }}" class="form-control" required>
                            @foreach ($all_pages as $key => $page)
                            <option value="{{ $key }}"
                                {{ !empty($sitecontent['banner_link_url_sec3' . $i]) && $sitecontent['banner_link_url_sec3' . $i] == $key ? 'selected' : '' }}>
                                {{ $page }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endfor
            </div>
        </div>
      
    </div>
</div>


</div> -->



    <div class="card">

        <div class="card-header">
            <h5>Section 3</h5>
        </div>

        <div class="card-body">

<div class="row">
    <div class="col">
        <div class="card w-100 border position-relative overflow-hidden">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="file_choose_icon">
                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image6']) ? $sitecontent['image6'] : '') }}" alt="matdash-img" class="img-fluid ">
                    </div>
                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    <input class="form-control uploadFile" name="image6" type="file"
                        data-bs-original-title="" title="">
                </div>
            </div>


            
           
        </div>

        <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label" for="section4_v_heading"> Heading</label>
                    <input class="form-control" id="section4_v_heading" type="text"
                        name="section4_v_heading" placeholder=""
                        value="{{ !empty($sitecontent['section4_v_heading']) ? $sitecontent['section4_v_heading'] : '' }}">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label" for="section4_v_text"> Text</label>
                    <input id="section4_v_text" name="section4_v_text" type="text" class="form-control" value="{{ !empty($sitecontent['section4_v_text']) ? $sitecontent['section4_v_text'] : "" }}" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label" for="section4_v_link"> Video Link</label>
                    <input class="form-control" id="section4_v_link" type="text"
                        name="section4_v_link" placeholder=""
                        value="{{ !empty($sitecontent['section4_v_link']) ? $sitecontent['section4_v_link'] : '' }}">
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
            
           

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <label class="form-label" for="section4_link_text">Button Text</label>
                        <input class="form-control" id="section4_link_text" type="text"
                            name="section4_link_text" placeholder=""
                            value="{{ !empty($sitecontent['section4_link_text']) ? $sitecontent['section4_link_text'] : "" }}">
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
</div>

    </div>



 

   
    @endsection