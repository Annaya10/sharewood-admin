<footer>
    <div class="contain">
        <div class="flex">
            <!-- Contact Info Section -->
            <div class="col">
                <h5>Contact Info</h5>
                <ul class="lst">
                    <li><a href="mailto:{{ $site_settings->site_email }}">{{ $site_settings->site_email }}</a></li>
                    <li><a href="tel:{{ $site_settings->site_phone }}">{{ $site_settings->site_phone }}</a></li>
                </ul>
                <div class="br"></div>
                <h5>Follow us on</h5>
                <ul class="social_lnks">
                    <li>
                        <a href="{{ $site_settings->site_facebook }}" target="_blank"><img src="{{ asset('assets/images/facebook.svg') }}" alt="Facebook"></a>
                    </li>
                    <li><a href="{{ $site_settings->site_instagram }}" target="_blank"><img src="{{ asset('assets/images/instagram.svg') }}" alt="Instagram"></a></li>
                    <li><a href="{{ $site_settings->site_twitter }}" target="_blank"><img src="{{ asset('assets/images/twitter.svg') }}" alt="Twitter"></a></li>
                    <li><a href="{!! $site_settings->site_discord !!}" target="_blank"><img src="{{ asset('assets/images/linkedin.svg') }}" alt="LinkedIn"></a></li>
                </ul>
            </div>

            <!-- Short Links Section -->
            <div class="col">
                <h5>Short Links</h5>
                <ul class="lst">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('products') }}">Products & Capabilities</a></li>
                    <li><a href="{{ url('careers') }}">Jobs</a></li>
                    <li><a href="{{ url('team') }}">Team Tecvox</a></li>
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                </ul>
            </div>

            <!-- Company Section -->
            <div class="col">
                <h5>Company</h5>
                <ul class="lst">
                    <li><a href="{{ url('about') }}">Company Overview</a></li>
                    <li><a href="{{ url('about#vision') }}">Vision</a></li>
                    <li><a href="{{ url('about#locations') }}">Global Locations</a></li>
                    <li><a href="{{ url('about#manufacturing') }}">Manufacturing</a></li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>
                </ul>
            </div>

            <!-- Newsletter Section -->
            <div class="col">
                <h5>Join our mailing list</h5>
                <form action="{{ url('newsletter') }}" method="post" autocomplete="off" class="frmAjax" id="frmNewsletter" novalidate="novalidate">
                    @csrf
                    <label for="email">Stay up to date with the latest news and deals!</label>
                    <div class="txtGrp relative">
                        <input type="email" name="email" id="email" class="input" placeholder="@ your email address">
                        <button type="submit" class="site_btn">Submit<i class="fi-arrow-right fi-2x"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Section -->
    <div class="copy_right">
        <div class="contain">
            <div class="_inner">
                <p>Copyright©{{ date('Y') }} <a href="/">{{ $site_settings->site_name }}</a>, {{ $site_settings->site_copyright }}</p>
                <ul class="lst">
                    <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('terms-conditions') }}">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>