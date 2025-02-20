<main index>
    <section class="banner" id="banner">
        <div class="cntnt">
            <div class="contain">
                <div class="inner_cntnt">
                    <h1>{!! $sitecontent['banner_heading'] !!}
                        <em class="typewrite" data-period="2000" data-type="{{ $sitecontent['banner_typing'] }}">
                            Faster
                            <span class="wrap"></span>
                        </em>
                    </h1>
                    <p>{!! $sitecontent['banner_text'] !!}</p>
                    <div class="btn_blk">
                        <a href="{!! $sitecontent['banner_link_url_1'] !!}" class="site_btn blank">{!! $sitecontent['banner_link_text_1'] !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="after_banner">
        <div class="contain">
            <div class="flex">
                <?php $how_block_count = 0; ?>
                @for ($i = 2; $i <= 4; $i++)
                    <?php $how_block_count = $how_block_count + 1; ?>
                    <div class="col">
                    <div class="inner">
                        <div class="img_icon">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="">
                        </div>
                        <h4>{{ !empty($sitecontent['sec1_heading' . $i]) ? $sitecontent['sec1_heading' . $i] : "" }}</h4>
                    </div>
                    <p>{{ !empty($sitecontent['sec1_text' . $i]) ? $sitecontent['sec1_text' . $i] : "" }}</p>
            </div>
            @endfor
        </div>
        </div>
    </section>
    <section class="about_sec">
        <div class="contain">
            <div class="flex">
                <div class="colL">
                    <div class="image">
                        <img src="{{ get_site_image_src('images', $sitecontent['image5']) }}" alt="{!! $sitecontent['section2_heading'] !!}">
                    </div>
                </div>
                <div class="colR">
                    <div class="sec_heading">
                        <h5>{!! $sitecontent['section2_top_heading'] !!}</h5>
                        <h2>{!! $sitecontent['section2_heading'] !!}</h2>
                    </div>
                    <p>{!! $sitecontent['section2_text'] !!}</p>
                    <div class="btn_blk">
                        <a href="{!! $sitecontent['section2_link_url'] !!}" class="site_btn">{!! $sitecontent['section2_link_text'] !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="process_sec">
        <div class="contain">
            <div class="flex">
                <div class="colL">
                    <div class="sec_heading">
                        <h5>{!! $sitecontent['section3_top_heading'] !!}</h5>
                        <h2>{!! $sitecontent['section3_heading'] !!}</h2>
                    </div>
                    <p>{!! $sitecontent['section3_text'] !!}</p>

                </div>
                <div class="colR">
                    <div class="image">
                        <img src="{{ get_site_image_src('images', $sitecontent['image6']) }}" alt="{!! $sitecontent['section3_heading'] !!}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service_sec">
        <div class="contain">
            <div class="cntnt">
                <div class="sec_heading text-center">
                    <h2>{!! $sitecontent['section4_heading'] !!}</h2>
                </div>

            </div>

            <div class="flex blog_flex">
                @foreach ($products as $product)
                <div class="col">
                    <div class="inner">
                        <div class="image">
                            <img src="{{ get_site_image_src('products', !empty($product) ? $product->image : '') }}" alt="{!! $product->title !!}" />
                        </div>
                        <div class="txt">
                            <h5><a href="{{ url('products') }}">{!! $product->title !!}</a></h5>
                            <p>{!! Str::limit($product->detail, 100) !!}</p>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            </br></br></br>
            <div class="btn_blk text-center">
                <a href="{{ url('products') }}" class="site_btn">View All Products</a>
            </div>
        </div>
    </section>
    <section class="grid_icons">

        <div class="contain">
            <div class="flex">
                <div class="col">
                    <div class="inner" style="background-image: url('{{ get_site_image_src('images', $sitecontent['image7']) }}'">
                        <div class="cntnt">
                            <h2>{!! $sitecontent['sec5_heading'] !!}</h2>
                            <div class="btn_blk">
                                <a href="{!! $sitecontent['section5_link_url'] !!}" class="site_btn">{!! $sitecontent['section5_link_text'] !!}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <?php $what_offer = 0; ?>
                    @for ($i = 8; $i <= 9; $i++)
                        <?php $what_offer++; ?>
                        <div class="_inner">
                        <div class="mst">
                            <div class="img_icon">
                                <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="{{ !empty($sitecontent['sec5_heading' . $i]) ? $sitecontent['sec5_heading' . $i] : "" }}">
                            </div>
                            <h4>{{ !empty($sitecontent['sec5_heading' . $i]) ? $sitecontent['sec5_heading' . $i] : "" }}</h4>
                            <p>{{ !empty($sitecontent['sec5_text' . $i]) ? $sitecontent['sec5_text' . $i] : "" }} </p>
                        </div>
                </div>
                @endfor
            </div>

        </div>
        </div>
    </section>
</main>