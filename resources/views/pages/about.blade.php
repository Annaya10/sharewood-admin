<main index>
    <section id="overview" class="abt_banner all_sub">
        <div class="contain">
            <div class="cntnt">
                {!! $sitecontent['banner_text'] !!}
            </div>
            <div class="image">
                <img src="{{ get_site_image_src('images', $sitecontent['image1']) }}" alt="{!! $sitecontent['overview_heading'] !!}">
            </div>
            <div class="overview_blk">
                <div class="sec_heading">
                    <h5>{!! $sitecontent['overview_top_heading'] !!}</h5>
                    <h2>{!! $sitecontent['overview_heading'] !!}</h2>
                </div>
                {!! $sitecontent['overview_text'] !!}
            </div>
        </div>
    </section>
    <section id="vision" class="half_sec_abt" style="background-image: url('{{ get_site_image_src('images', $sitecontent['image2']) }}'">
        <div class="contain">
            <div class="flex">
                <div class="colL">
                    <div class="sec_heading">
                        <h5> {!! $sitecontent['section1_left_top_heading'] !!}</h5>
                        <h2> {!! $sitecontent['section1_left_heading'] !!}</h2>
                    </div>
                    <p>{!! $sitecontent['section1_text'] !!}</p>
                </div>
                <div class="colR">
                    <div class="inner">
                        <div class="sec_heading">
                            <h2>{!! $sitecontent['section1_right_heading'] !!}</h2>
                        </div>
                        <p>{!! $sitecontent['section1_right_text'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="value_abt">
        <div class="contain">
            <div class="sec_heading text-center">
                <h5>{!! $sitecontent['section2_top_heading'] !!}</h5>
                <h2>{!! $sitecontent['section2_heading'] !!}</h2>
            </div>
            <div class="flex">
                <?php $value = 0; ?>
                @for ($i = 3; $i <= 6; $i++)
                    <?php $value = $value + 1; ?>
                    <div class="col">
                    <div class="inner">
                        <div class="icon_img">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="">
                        </div>
                        <h4>{{ !empty($sitecontent['sec2_heading' . $i]) ? $sitecontent['sec2_heading' . $i] : "" }}</h4>
                    </div>
            </div>
            @endfor
        </div>
        </div>
    </section>
    <section id="locations" class="location_map">
        <div class="contain">
            <div class="sec_heading">
                <h5>{!! $sitecontent['section3_top_heading'] !!}</h5>
                <h2>{!! $sitecontent['section3_heading'] !!}</h2>
            </div>


            <div class="image_map">
                <img src="assets/images/map-image.svg" alt="">
                <div class="pointers">
                    @foreach($markers as $marker)
                    <div
                        class="marker {{ $marker->class }}"
                        data-regin="{{ $marker->name }}"
                        style="position: absolute; top: {{ $marker->top }}%; left: {{ $marker->left }}%;">
                        <img src="assets/images/map-marker.png" alt="">
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex map_flex_dv">
                @foreach($groupedLocations as $group)
                <div class="col">
                    <div class="inner">
                        <h5>{{ $group['category']->center_cat }}</h5>
                        @foreach($group['locations'] as $location)
                        <a href="javascript:void(0)" data-regin="{{ $location->name }}">
                            {{ $location->office_name }} - {{ $location->city_name }}, {{ $location->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <section class="grid_grid" id="manufacturing">
        <div class="contain">
            <div class="flex">
                <div class="colL">
                    <div class="inner">
                        <div class="image">
                            <img src="{{ get_site_image_src('images', $sitecontent['image7']) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="colR">
                    <div class="sec_heading">
                        <h5>{!! $sitecontent['section4_top_heading'] !!}</h5>
                        <h2>{!! $sitecontent['section4_heading'] !!}</h2>
                    </div>
                    <p>{!! $sitecontent['section4_text'] !!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="cta_sec">
        <div class="contain">
            <div class="cta_blk">
                {!! $sitecontent['section5_text'] !!}
                <div class="btn_blk text-center">
                    <a href="{!! $sitecontent['section5_link_url'] !!}" class="site_btn">{!! $sitecontent['section5_link_text'] !!}</a>
                </div>
            </div>
        </div>
    </section>
</main>