<main index>
    <section id="overview" class="abt_banner all_sub">
        <div class="contain">
            <div class="cntnt">
                {!! $sitecontent['banner_text'] !!}
            </div>
        </div>
    </section>
    <section class="blog_blog_pg">
        <div class="contain">
            <div class="featured_blog">
                <div class="flex">
                    @foreach ($featured_blogs as $featured_blog)
                    <div class="_col">
                        <div class="inner"><a href="{!! url('blog-detail/' . $featured_blog->slug) !!}"></a>
                            <div class="image">
                                <img src="{{ get_site_image_src('blog', !empty($featured_blog) ? $featured_blog->image : '') }}" alt="{!! $featured_blog->title !!}" />
                            </div>
                            <div class="cntnt">
                                <div class="category">{!! get_blog_cats($featured_blog->category )!!}</div>
                                <h4>{!! $featured_blog->title !!}</h4>
                                <div class="date">{!! format_date($featured_blog->blog_date , "d F, Y") !!}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="all_blog">
                <div class="tabs_account">
                    <ul class="nav nav-tabs">
                        @foreach ($blog_categories as $blog_cats)
                        <li class="@if ($loop->first) active @endif">
                            <a data-toggle="tab" href="#tab{{ $blog_cats->id }}" class="category-tab" data-id="{{ $blog_cats->id }}">
                                {!! $blog_cats->name !!}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content">
                    <div id="blog-content">
                        <!-- Blogs related to the first tab will be loaded here -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="cta_sec">
        <div class="contain">
            <div class="cta_blk">
                {!! $sitecontent['section3_text'] !!}
                <div class="btn_blk text-center">
                    <a href=" {!! $sitecontent['section3_link_url'] !!}" class="site_btn"> {!! $sitecontent['section3_link_text'] !!}</a>
                </div>
            </div>
        </div>
    </section>
</main>