<main index>
    <section class="textual_banner">
        <div class="contain">
            <div class="blok_textual" style="background-image: url('{{ get_site_image_src('images', $sitecontent['image1']) }}'">
                <h1>{!! $sitecontent['section1_heading'] !!}</h1>
            </div>
        </div>
    </section>
    <section class="textual_editor">
        <div class="contain">
            <div class="ck_editor">
                {!! $sitecontent['section1_text'] !!}
            </div>
        </div>
    </section>
    <section class="cta_sec">
        <div class="contain">
            <div class="cta_blk">
                <h2>Ready to Drive Connectivity Forward?</h2>
                <p>Let’s Build the Future of Automotive Connectivity Together!</p>
                <div class="btn_blk text-center">
                    <a href="{{ url('contact') }}" class="site_btn">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</main>