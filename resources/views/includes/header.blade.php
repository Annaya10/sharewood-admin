<header class="ease">
    <div class="contain">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="toggle"><span></span></div>
        <nav class="ease" id="nav">
            <ul>
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">Home</a>
                </li>

                <li class="drop {{ request()->is('company') ? 'active' : '' }}">
                    <a href="javascript:void(0)">Company</a>
                    <ul class="sub">
                        <li><a href="{{ url('about') }}">Company Overview</a></li>
                        <li><a href="{{ url('about#vision') }}">Vision</a></li>
                        <li><a href="{{ url('about#locations') }}">Global Locations</a></li>
                        <li><a href="{{ url('about#manufacturing') }}">Manufacturing</a></li>
                    </ul>
                </li>

                <li class="{{ request()->is('products') ? 'active' : '' }}">
                    <a href="{{ url('products') }}">Products & Capabilities</a>
                </li>

                <li class="drop {{ request()->is('careers') ? 'active' : '' }}">
                    <a href="javascript:void(0)">Careers</a>
                    <ul class="sub">
                        <li><a href="{{ url('careers') }}">Jobs</a></li>
                        <li><a href="{{ url('careers#team') }}">Team Tecvox</a></li>
                    </ul>
                </li>

                <li class="{{ request()->is('supplier') ? 'active' : '' }}">
                    <a href="{{ url('supplier') }}">Supplier Portal</a>
                </li>

                <li class="btn_blk">
                    <a href="{{ url('contact') }}" class="site_btn">Contact Us</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </div>
</header>

<div class="pBar hidden">
    <span id="myBar" style="width:0%"></span>
</div>