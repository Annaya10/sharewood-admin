<main index>
    <section class="blog_details">
    </section>
    <section class="blog_cntnt_sec">
        <div class="contain">
            <div class="detail_blog_cntnt">
                <div class="cntnt text-center">
                    <div class="category">{!! $blog_post->cat_name !!}</div>
                    <h2>{!! $blog_post->title !!}</h2>
                    <div class="date">{!! format_date($blog_post->blog_date , "d F, Y") !!}</div>
                </div>
                <div class="image">
                    <img src="{{ get_site_image_src('blog', !empty($blog_post) ? $blog_post->image : '') }}" alt="{!! $blog_post->title !!}" />
                </div>
                {!! $blog_post->detail !!}

                <!-- <div class="share_blk">
                    <p>Share On</p>
                    <ul class="social_lnks">
                        <li>
                            <a href="https://www.facebook.com"><img src="assets/images/facebook.svg" alt=""></a>
                        </li>
                        <li><a href=""><img src="assets/images/instagram.svg" alt=""></a></li>
                        <li><a href="https://twitter.com"><img src="assets/images/twitter.svg" alt=""></a></li>
                        <li><a href=""><img src="assets/images/linkedin.svg" alt=""></a></li>
                    </ul>
                </div> -->

            </div>
        </div>
    </section>
    <section class="cta_sec">
        <div class="contain">
            <div class="cta_blk">
                <h2>Ready to Drive Connectivity Forward?</h2>
                <p>Let’s Build the Future of Automotive Connectivity Together!</p>
                <div class="btn_blk text-center">
                    <a href="{!! url('contact') !!}" class="site_btn">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</main>