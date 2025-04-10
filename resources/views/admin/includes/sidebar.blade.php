<?php $admin_page = request()->segment(2); ?>
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="{{ url('admin/dashboard') }}" class="text-nowrap logo-img">
        <img src="{{ get_site_image_src('images', $site_settings->site_logo) }}" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'dashboard' ? 'active' : '' }}" href="{{ url('admin/dashboard') }}" aria-expanded="false">
            <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li>
          <span class="sidebar-divider lg"></span>
        </li>


        
        <li class="nav-small-cap">
          <iconify-icon icon="fluent-mdl2:content-feed"></iconify-icon>
          <span class="hide-menu">Site Content</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'sitecontent' ? 'active' : '' }}" href="{{ url('admin/sitecontent') }}" aria-expanded="false">
            <iconify-icon icon="oui:pages-select"></iconify-icon>
            <span class="hide-menu">Website Pages</span>
          </a>
        </li>

        <!-- <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'manage-boosters' ? 'active' : '' }}" href="{{ url('admin/manage-boosters') }}" aria-expanded="false">
            <iconify-icon icon="oui:pages-select"></iconify-icon>
            <span class="hide-menu">Manage Boosters</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'manage-users' ? 'active' : '' }}" href="{{ url('admin/manage-users') }}" aria-expanded="false">
            <iconify-icon icon="oui:pages-select"></iconify-icon>
            <span class="hide-menu">Manage Users</span>
          </a>
        </li> -->






        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ $admin_page == 'packages' || $admin_page == 'package_categories' ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="mdi:location"></iconify-icon>
            <span class="hide-menu">Packages</span>
          </a>

          <ul aria-expanded="false" class="collapse first-level {{ $admin_page == 'packages' || $admin_page == 'package_categories' ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ $admin_page == 'packages' ? 'active' : '' }}" href="{{ url('admin/packages') }}">
                <span class="icon-small"></span>All Packages 
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link {{ $admin_page == 'package_categories' ? 'active' : '' }}" href="{{ url('admin/package_categories') }}">
                <span class="icon-small"></span>Categories
              </a>
            </li>
           
          </ul>
      
        </li>




        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'tournament' ? 'active' : '' }}" href="{{ url('admin/tournament') }}">
            <iconify-icon icon="mdi:file"></iconify-icon>
            Tournaments

          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'event' ? 'active' : '' }}" href="{{ url('admin/event') }}">
            <iconify-icon icon="mdi:file"></iconify-icon>
            Events

          </a>
        </li>

       

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'course' ? 'active' : '' }}" href="{{ url('admin/course') }}">
            <iconify-icon icon="mdi:message"></iconify-icon>
            Courses

          </a>
        </li>
   

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'faqs' ? 'active' : '' }}" href="{{ url('admin/faqs') }}">
            <iconify-icon icon="mdi:eye"></iconify-icon>
            Faqs

          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'team' ? 'active' : '' }}" href="{{ url('admin/team') }}" aria-expanded="false">
            <iconify-icon icon="jam:users"></iconify-icon>
            <span class="hide-menu">Team</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'testimonials' ? 'active' : '' }}" href="{{ url('admin/testimonials') }}" aria-expanded="false">
            <iconify-icon icon="jam:users"></iconify-icon>
            <span class="hide-menu">Testimonials</span>
          </a>
        </li>

        
        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'gallery' ? 'active' : '' }}" href="{{ url('admin/gallery') }}">
            <iconify-icon icon="mdi:image"></iconify-icon>
            Our Guest Gallery

          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'sponsership' ? 'active' : '' }}" href="{{ url('admin/sponsership') }}">
            <iconify-icon icon="mdi:shopping-outline"></iconify-icon>
            Sponsership

          </a>
        </li>

        <li class="nav-small-cap">
          <iconify-icon icon="octicon:gear-24"></iconify-icon>
          <span class="hide-menu">Site Settings</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'site_settings' ? 'active' : '' }}" href="{{ url('admin/site_settings') }}" aria-expanded="false">
            <iconify-icon icon="octicon:gear-24"></iconify-icon>
            <span class="hide-menu">Site Settings</span>
          </a>
        </li>




        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'booking' ? 'active' : '' }}" href="{{ url('admin/booking') }}" aria-expanded="false">
            <iconify-icon icon="tabler:message-user"></iconify-icon>
            <span class="hide-menu">Booking Request</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'reservation' ? 'active' : '' }}" href="{{ url('admin/reservation') }}" aria-expanded="false">
            <iconify-icon icon="tabler:message-user"></iconify-icon>
            <span class="hide-menu">Reservation</span>
          </a>
        </li>
        <!-- <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'subscribers' ? 'active' : '' }}" href="{{ url('admin/subscribers') }}" aria-expanded="false">
            <iconify-icon icon="jam:newsletter"></iconify-icon>
            <span class="hide-menu">Subscribers</span>
          </a>
        </li> -->


      </ul>

    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>