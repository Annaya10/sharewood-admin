@extends('layouts.adminlayout')
@section('page_meta')
<meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
<meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
<meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
<title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('Accommodations')!!}
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
            <h5>Overview Section</h5>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="file_choose_icon">
                                    <img src="{{ get_site_image_src('images', !empty($sitecontent['image1']) ? $sitecontent['image1'] : '') }}" alt="matdash-img" class="img-fluid ">
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


            <div class="row card-body">
        <?php $how_block_count_challets = 0; ?>
                <?php $how_block_count2_challets = 13; ?>
            @for ($i = 2; $i <= 4; $i++)
                <?php $how_block_count_challets = $how_block_count_challets + 1; ?>

                <?php $how_block_count2_challets = $how_block_count2_challets + 1; ?>
                <div class="col-4">
                    <div class="card">

                        <div class="card-header">
                            <h5>Block {{ $how_block_count_challets }}</h5>
                        </div>
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                        <div class="text-center">
                                        <div class="file_choose_icon">
                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $how_block_count2_challets]) ? $sitecontent['image' . $how_block_count2_challets] : '') }}" alt="matdash-img" class="img-fluid " >
                                        </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input class="form-control uploadFile" name="image{{ $how_block_count2_challets }}" type="file"
                                                data-bs-original-title="" title="">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="sec5_heading{{ $i }}">Heading
                                            {{ $how_block_count_challets }}</label>
                                        <input class="form-control"
                                            id="sec5_heading{{ $i }}" type="text"
                                            name="sec5_heading{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec5_heading' . $i]) ? $sitecontent['sec5_heading' . $i] : "" }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label class="form-label"
                                            for="sec5_text{{ $i }}">Text
                                            {{ $how_block_count_challets }}</label>
                                        <textarea id="sec5_text{{ $i }}" name="sec5_text{{ $i }}" rows="4"
                                            class="form-control editor">{{ !empty($sitecontent['sec5_text' . $i]) ? $sitecontent['sec5_text' . $i] : "" }}</textarea>
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
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image3']) ? $sitecontent['image3'] : "") }}" alt="matdash-img" class="img-fluid ">
                        </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image3" type="file"
                            data-bs-original-title="" title="">
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
        <?php $how_block_count = 0; ?>
                <?php $how_block_count2 = 4; ?>
                <?php $icon_image = 9; ?>
            @for ($i = 2; $i <= 5; $i++)
                <?php $how_block_count = $how_block_count + 1; ?>

                <?php $how_block_count2 = $how_block_count2 + 1; ?>
                <?php $icon_image = $icon_image + 1; ?>
                <div class="col-6">
                    <div class="card">

                        <div class="card-header">
                            <h5>Block {{ $how_block_count }}</h5>
                        </div>
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                        <div class="text-center">
                                        <div class="file_choose_icon">
                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $how_block_count2]) ? $sitecontent['image' . $how_block_count2] : '') }}" alt="matdash-img" class="img-fluid " >
                                        </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input class="form-control uploadFile" name="image{{ $how_block_count2 }}" type="file"
                                                data-bs-original-title="" title="">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                        <div class="text-center">
                                        <div class="file_choose_icon">
                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $icon_image]) ? $sitecontent['image' . $icon_image] : '') }}" alt="matdash-img" class="img-fluid " >
                                        </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input class="form-control uploadFile" name="image{{ $icon_image }}" type="file"
                                                data-bs-original-title="" title="">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
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
                          
                        </div>
                    </div>
                </div>
            @endfor
              
        </div>

        <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section2_text"> Text</label>
                        <textarea id="section2_text" name="section2_text" rows="4" class="editor">{{ !empty($sitecontent['section2_text']) ? $sitecontent['section2_text'] : "" }}</textarea>
                    </div>
                </div>
      
    </div>
</div>


</div>


 
   


   
    






<div class="card">

<div class="card-header">
    <h5>Section 4</h5>
</div>

<div class="card-body">

    <div class="row">

    <div class="col-md-4">
    <div class="col">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="file_choose_icon">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image19']) ? $sitecontent['image19'] : "") }}" alt="matdash-img" class="img-fluid ">
                        </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image19" type="file"
                            data-bs-original-title="" title="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="file_choose_icon">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image20']) ? $sitecontent['image20'] : "") }}" alt="matdash-img" class="img-fluid ">
                        </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image20" type="file"
                            data-bs-original-title="" title="">
                    </div>
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
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section4_text"> Text</label>
                        <textarea id="section4_text" name="section4_text" rows="4" class="editor">{{ !empty($sitecontent['section4_text']) ? $sitecontent['section4_text'] : "" }}</textarea>
                    </div>
                </div>

                <div class="row">
            @for ($i = 1; $i < 2; $i++)
            <div class="col">
                <div class="mb-4">
                    <label class="form-label" for="banner_link_text_sec2{{ $i }}">Link Text {{ $i }}</label>
                    <input class="form-control" id="banner_link_text_sec2{{ $i }}" type="text"
                        name="banner_link_text_sec2{{ $i }}" placeholder=""
                        value="{{ !empty($sitecontent['banner_link_text_sec2' . $i]) ? $sitecontent['banner_link_text_sec2' . $i] : '' }}">
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label class="form-label" for="banner_link_url_sec2{{ $i }}">Link URL {{ $i }}</label>
                    <select name="banner_link_url_sec2{{ $i }}" class="form-control" required>
                        @foreach ($all_pages as $key => $page)
                            <option value="{{ $key }}"
                                {{ !empty($sitecontent['banner_link_url_sec2' . $i]) && $sitecontent['banner_link_url_sec2' . $i] == $key ? 'selected' : '' }}>
                                {{ $page }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endfor
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


</div>



   
  
   
    @endsection