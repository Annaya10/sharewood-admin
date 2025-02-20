<main index>
    <section class="all_banner">
        <div class="contain">
            <h1> {!! $sitecontent['banner_text'] !!}</h1>
        </div>
    </section>
    <section class="product_pg_grid">
        <div class="contain">
            <div class="flex">

                @foreach ($products as $product)
                <div class="col">
                    <div class="inner">
                        <div class="image">
                            <img src="{{ get_site_image_src('products', !empty($product) ? $product->image : '') }}" alt="{!! $product->title !!}" />
                        </div>
                        <h3>{!! $product->title !!}</h3>
                        <p>{!! $product->detail !!}</p>
                        <!-- <a href="javascript:void(0)" class="pop_btn" data-popup="product">Read More</a> -->

                        <a href="javascript:void(0)"
                            class="pop_btn"
                            data-popup="product"
                            data-title="{{ $product->title }}"
                            data-detail="{!! $product->detail !!}"
                            data-heading_1="{{ $product->heading_1 }}"
                            data-block_1="{{ $product->block_1 }}"
                            data-heading_2="{{ $product->heading_2 }}"
                            data-block_2="{{ $product->block_2 }}"

                            data-image="{{ get_site_image_src('products', !empty($product) ? $product->image : '') }}">
                            Read More
                        </a>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>
    <section class="cta_sec">
        <div class="contain">
            <div class="cta_blk">
                {!! $sitecontent['section2_text'] !!}
                <div class="btn_blk text-center">
                    <a href="{!! $sitecontent['section2_link_url'] !!}" class="site_btn"> {!! $sitecontent['section2_link_text'] !!}</a>
                </div>
            </div>
        </div>
    </section>
</main>
<section data-popup="product" class="popup">
    <div class="table_dv">
        <div class="table_cell">
            <div class="_inner">
                <button class="x_btn"></button>
                <div class="product_detail">
                    <div class="image">
                        <img src="" alt="">
                    </div>
                    <h3 id="pro_title"></h3>
                    <p></p>
                    <div class="flex">
                        <div class="col">
                            <h3 id="head_1">Key Features</h3>
                            <ul class="key_features">
                                <!-- Content will be dynamically populated -->
                            </ul>
                        </div>
                        <div class="col">
                            <h3 id="head_2">Technical Specifications</h3>
                            <ul class="technical_specs">
                                <!-- Content will be dynamically populated -->
                            </ul>
                        </div>
                    </div>
                    <div class="btn_blk">
                        <a href="{{ url('contact') }}">Click for more information</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>