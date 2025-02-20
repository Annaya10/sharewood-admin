<main index>
    <section class="contact_banner">
        <div class="contain">
            <div class="blk_contact">
                {!! $sitecontent['banner_text'] !!}
            </div>
        </div>
    </section>
    <section class="contact_info">
        <div class="contain">
            <div class="flex">
                <div class="colL">
                    {!! $sitecontent['section2_text'] !!}
                </div>
                <div class="colR">
                    <div class="flex_contact">
                        <div class="col">
                            <div class="inner">
                                <div class="img_icon">
                                    <img src="assets/images/map.svg" alt="{{ $site_settings->site_address }}">
                                </div>
                                <p>{{ $site_settings->site_address }}</p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="inner">
                                <div class="img_icon">
                                    <img src="assets/images/call.svg" alt="{{ $site_settings->site_phone }}">
                                </div>
                                <a href="tel:{{ $site_settings->site_phone }}">{{ $site_settings->site_phone }}</a>
                            </div>
                        </div>

                        <div class="col">
                            <div class="inner">
                                <div class="img_icon">
                                    <img src="assets/images/email.svg" alt="{{ $site_settings->site_email }}">
                                </div>
                                <a href="mailto:{{ $site_settings->site_email }}">{{ $site_settings->site_email }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ url('contact_us') }}" method="post" autocomplete="off" class="frmAjax" id="frmContact" novalidate="novalidate">
                @csrf
                <h3>Have a Quick Question?</h3>
                <div class="row form_row">
                    <!-- <div class="col-md-12">
                        <input type="hidden" class="input" name="product">
                    </div> -->
                    <div class="col-md-6">
                        <input type="text" name="fname" id="fname" class="input" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="lname" id="lname" class="input" placeholder="Last Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="phone" id="phone" class="input" placeholder="Phone Number">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" id="email" class="input" placeholder="Email Address">
                    </div>
                    <div class="col-md-12">
                        <textarea name="message" id="message" placeholder="Enter Your Message Here" class="input"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="hear_about" id="hear_about" class="input" placeholder="How did you hear about us?">
                    </div>
                </div>
                <div class="btn_blk">
                    <button class="site_btn">Send Message</button>
                </div>
            </form>

        </div>
    </section>
</main>