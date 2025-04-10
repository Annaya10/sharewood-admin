@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('Home Page')!!}
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
                                        placeholder="" value="{{ $sitecontent['page_title'] }}">
                    </div>
                </div>
            </div>
             <div class="row">
                 <div class="col">
                     <div>
                         <label class="form-label" for="meta_title">Meta Title</label>
                         <input class="form-control" id="meta_title" type="text" name="meta_title"
                                        placeholder="" value="{{ $sitecontent['meta_title'] }}">
                     </div>
                 </div>
             </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label class="form-label" for="site_meta_desc">Meta Description</label>
                        <textarea class="form-control" id="meta_description" rows="3" name="meta_description">{{ $sitecontent['meta_description'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col">
                    <div>
                        <label class="form-label" for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" id="meta_keywords" rows="3" name="meta_keywords">{{ $sitecontent['meta_keywords'] }}</textarea>
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
                          <img src="{{ get_site_image_src('images', $sitecontent['image1']) }}" alt="matdash-img" class="img-fluid " >
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
                            <label class="form-label" for="banner_heading1">Heading</label>
                            <input class="form-control" id="banner_heading1" type="text"
                                name="banner_heading1" placeholder=""
                                value="{{ !empty($sitecontent['banner_heading1']) ? $sitecontent['banner_heading1'] : "" }}">
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col">
                        <div class="mb-3">
                        <label class="form-label" for="banner_typing">Enter Words (comma-separated):</label>
                        <textarea id="banner_typing" name="banner_typing" rows="4" class="editor">
                            {{ $sitecontent['banner_typing'] ?? '' }}
                        </textarea>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="banner_text">Text</label>
                            <textarea id="banner_text" name="banner_text" rows="4" class="editor">{{ $sitecontent['banner_text'] }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    @for ($i = 1; $i < 3; $i++)
                    <div class="col">
                        <div class="mb-4">
                            <label class="form-label" for="banner_link_text_{{ $i }}">Link Text {{ $i }}</label>
                            <input class="form-control" id="banner_link_text_{{ $i }}" type="text"
                                name="banner_link_text_{{ $i }}" placeholder=""
                                value="{{ !empty($sitecontent['banner_link_text_' . $i]) ? $sitecontent['banner_link_text_' . $i] : '' }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label class="form-label" for="banner_link_url_{{ $i }}">Link URL {{ $i }}</label>
                            <select name="banner_link_url_{{ $i }}" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['banner_link_url_' . $i]) && $sitecontent['banner_link_url_' . $i] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endfor
                </div>                 -->
                
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
                          <img src="{{ get_site_image_src('images', $sitecontent['image2']) }}" alt="matdash-img" class="img-fluid " >
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
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="banner_heading1">Heading</label>
                            <input class="form-control" id="section1_heading" type="text"
                                name="section1_heading" placeholder=""
                                value="{{ !empty($sitecontent['section1_heading']) ? $sitecontent['section1_heading'] : "" }}">
                        </div>
                    </div>
                </div>
            
                 <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section1__text">Text</label>
                            <textarea id="banner_text" name="section1__text" rows="4" class="editor">{{ $sitecontent['section1__text'] }}</textarea>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="row">
                    @for ($i = 1; $i < 3; $i++)
                    <div class="col">
                        <div class="mb-4">
                            <label class="form-label" for="banner_link_text_{{ $i }}">Link Text {{ $i }}</label>
                            <input class="form-control" id="banner_link_text_{{ $i }}" type="text"
                                name="banner_link_text_{{ $i }}" placeholder=""
                                value="{{ !empty($sitecontent['banner_link_text_' . $i]) ? $sitecontent['banner_link_text_' . $i] : '' }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label class="form-label" for="banner_link_url_{{ $i }}">Link URL {{ $i }}</label>
                            <select name="banner_link_url_{{ $i }}" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['banner_link_url_' . $i]) && $sitecontent['banner_link_url_' . $i] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endfor
                </div>               -->
                
            </div>

        </div>


  </div>

    <!-- <div class="card-body">

        <div class="row">

        <div class="col-md-12">
        <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="banner_heading">Heading</label>
                            <input class="form-control" id="banner_heading" type="text"
                                name="banner_heading" placeholder=""
                                value="{{ !empty($sitecontent['banner_heading']) ? $sitecontent['banner_heading'] : "" }}">
                        </div>
        </div>

        <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="banner_text">Text</label>
                            <textarea id="banner_text" name="banner_text" rows="4" class="editor">{{ $sitecontent['banner_text'] }}</textarea>
                        </div>
        </div>
        </div>

        
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
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                        <div class="text-center">
                                        <div class="file_choose_icon">
                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="matdash-img" class="img-fluid " >
                                        </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input class="form-control uploadFile" name="image{{ $i }}" type="file"
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
    </div> -->


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
                          <img src="{{ get_site_image_src('images', $sitecontent['image3']) }}" alt="matdash-img" class="img-fluid " >
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
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="banner_heading1">Heading</label>
                            <input class="form-control" id="section2_heading" type="text"
                                name="section2_heading" placeholder=""
                                value="{{ !empty($sitecontent['section2_heading']) ? $sitecontent['section2_heading'] : "" }}">
                        </div>
                    </div>
                </div>
            
                 <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section2__text">Text</label>
                            <textarea id="banner_text" name="section2__text" rows="4" class="editor">{{ !empty($sitecontent['section2__text']) ? $sitecontent['section2__text'] : "" }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    @for ($i = 1; $i < 2; $i++)
                    <div class="col">
                        <div class="mb-4">
                            <label class="form-label" for="banner_link_text_{{ $i }}">Link Text {{ $i }}</label>
                            <input class="form-control" id="banner_link_text_{{ $i }}" type="text"
                                name="banner_link_text_{{ $i }}" placeholder=""
                                value="{{ !empty($sitecontent['banner_link_text_' . $i]) ? $sitecontent['banner_link_text_' . $i] : '' }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label class="form-label" for="banner_link_url_{{ $i }}">Link URL {{ $i }}</label>
                            <select name="banner_link_url_{{ $i }}" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['banner_link_url_' . $i]) && $sitecontent['banner_link_url_' . $i] == $key ? 'selected' : '' }}>
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

  


</div>
<div class="card">

    <div class="card-header">
        <h5>Section 3</h5>
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
        <h5>Section 4</h5>
    </div>

    <div class="card-body">

        <div class="row">
          

            <div class="col-md-12">
                <div class="row">
              
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section4_heading">Heading</label>
                            <input class="form-control" id="section4_heading" type="text"
                                name="section4_heading" placeholder=""
                                value="{{ !empty($sitecontent['section4_heading']) ? $sitecontent['section4_heading'] : "" }}">
                        </div>
                    </div>

                   
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section4_text">Text</label>
                            <textarea id="section4_text" name="section4_text" rows="4" class=" editor">{{ !empty($sitecontent['section4_text']) ? $sitecontent['section4_text'] : "" }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section4_link_text">Link Text</label>
                            <input class="form-control" id="section4_link_text" type="text"
                                name="section4_link_text" placeholder=""
                                value="{{ !empty($sitecontent['section4_link_text']) ? $sitecontent['section4_link_text'] : "" }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section4_link_url">Link URL</label>
                            <select name="section4_link_url" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['section4_link_url']) && $sitecontent['section4_link_url'] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
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
        <h5>Section 5</h5>
    </div>

    <div class="card-body">

        <div class="row">
            

            <div class="col-md-12">
                <div class="row">
                   
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section5_heading">Heading</label>
                            <input class="form-control" id="section5_heading" type="text"
                                name="section5_heading" placeholder=""
                                value="{{ !empty($sitecontent['section5_heading']) ? $sitecontent['section5_heading'] : "" }}">
                        </div>
                    </div>

                    
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section5_text">Text</label>
                            <textarea id="section5_text" name="section5_text" rows="4" class=" editor">{{ !empty($sitecontent['section5_text']) ? $sitecontent['section5_text'] : "" }}</textarea>
                        </div>
                    </div>
                    
                </div>
              
            </div>


            <div class="row card-body">
        <?php $how_block_count = 0; ?>
                <?php $how_block_count2 = 9; ?>
            @for ($i = 2; $i <= 4; $i++)
                <?php $how_block_count = $how_block_count + 1; ?>

                <?php $how_block_count2 = $how_block_count2 + 1; ?>
                <div class="col-4">
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
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="sec5_heading{{ $i }}">Heading
                                            {{ $how_block_count }}</label>
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
                                            {{ $how_block_count }}</label>
                                        <textarea id="sec5_text{{ $i }}" name="sec5_text{{ $i }}" rows="4"
                                            class="form-control">{{ !empty($sitecontent['sec5_text' . $i]) ? $sitecontent['sec5_text' . $i] : "" }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label class="form-label"
                                            for="sec5_link{{ $i }}">Lear More Link
                                            {{ $how_block_count }}</label>
                                        <input id="sec5_link{{ $i }}" name="sec5_link{{ $i }}" type="text"
                                            class="form-control" value={{ !empty($sitecontent['sec5_link' . $i]) ? $sitecontent['sec5_link' . $i] : "" }} />
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

<div class="card">

    <div class="card-header">
        <h5>Testimonials Section</h5>
    </div>

    <div class="card-body">
      <div class="row">
            <div class="col-md-5">
                <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                      <div class="text-center">
                       <div class="file_choose_icon">
                          <img src="{{ get_site_image_src('images', $sitecontent['image7']) }}" alt="matdash-img" class="img-fluid " >
                       </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image7" type="file"
                            data-bs-original-title="" title="">
                      </div>
                    </div>
                  </div>
            </div>

            

        </div>


  </div>

  


</div>

<div class="card">
    <div class="card-header">
        <h5>Section 6</h5>
    </div>
    <div class="card-body">
        <div class="row">
           
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="sec6_heading">Heading</label>
                            <input class="form-control" id="sec6_heading" type="text"
                                name="sec6_heading" placeholder=""
                                value="{{ !empty($sitecontent['sec6_heading']) ? $sitecontent['sec6_heading'] : "" }}">
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="sec6_text">Text</label>
                            <textarea id="sec6_text" name="sec6_text" rows="4" class="editor">{{ !empty($sitecontent['sec6_text']) ? $sitecontent['sec6_text'] : "" }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="row">
                <div class="col">
                <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                      <div class="text-center">
                       <div class="file_choose_icon">
                          <img src="{{ get_site_image_src('images', $sitecontent['image5']) }}" alt="matdash-img" class="img-fluid " >
                       </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image5" type="file"
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
                          <img src="{{ get_site_image_src('images', $sitecontent['image6']) }}" alt="matdash-img" class="img-fluid " >
                       </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image6" type="file"
                            data-bs-original-title="" title="">
                      </div>
                    </div>
                  </div>
                </div>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="row">
        <?php $how_block_count_events = 0; ?>
                <?php $how_block_count_events2 = 15; ?>
            @for ($i = 2; $i <= 4; $i++)
                <?php $how_block_count_events = $how_block_count_events + 1; ?>

                <?php $how_block_count_events2 = $how_block_count_events2 + 1; ?>
                <div class="col-4">
                    <div class="card">

                        <div class="card-header">
                            <h5>Block {{ $how_block_count_events }}</h5>
                        </div>
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                        <div class="text-center">
                                        <div class="file_choose_icon">
                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $how_block_count_events2]) ? $sitecontent['image' . $how_block_count_events2] : '') }}" alt="matdash-img" class="img-fluid " >
                                        </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input class="form-control uploadFile" name="image{{ $how_block_count_events2 }}" type="file"
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
                                            for="sec6_heading_event{{ $i }}">Heading
                                            {{ $how_block_count_events }}</label>
                                        <input class="form-control"
                                            id="sec6_heading_event{{ $i }}" type="text"
                                            name="sec6_heading_event{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec6_heading_event' . $i]) ? $sitecontent['sec6_heading_event' . $i] : "" }}">
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

<div class="card">

    <div class="card-header">
        <h5>Section 7</h5>
    </div>

    <div class="card-body">

        <div class="row">
            

            <div class="col-md-12">
                <div class="row">
                   
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section7_heading">Heading</label>
                            <input class="form-control" id="section7_heading" type="text"
                                name="section7_heading" placeholder=""
                                value="{{ !empty($sitecontent['section7_heading']) ? $sitecontent['section7_heading'] : "" }}">
                        </div>
                    </div>

                    
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section7_text">Text</label>
                            <textarea id="section7_text" name="section7_text" rows="4" class=" editor">{{ !empty($sitecontent['section7_text']) ? $sitecontent['section7_text'] : "" }}</textarea>
                        </div>
                    </div>
                    
                </div>
              
            </div>


            <div class="row">
         

         <div class="col-12">
             <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
             <button class="btn btn-primary" type="submit">Update Page</button>
             </div>
         </div>
     </div>

        </div>
    </div>


</div>

@endsection
