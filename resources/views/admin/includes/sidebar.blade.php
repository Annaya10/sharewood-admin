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

        <li class="sidebar-item">
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
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'games' ? 'active' : '' }}" href="{{ url('admin/games') }}">
            <iconify-icon icon="mdi:shopping-outline"></iconify-icon>
            Manage Games 

          </a>
        </li>





        <!-- <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ $admin_page == 'markers' || $admin_page == 'center_categories' ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="mdi:location"></iconify-icon>
            <span class="hide-menu"> Global Locations</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ $admin_page == 'markers' || $admin_page == 'center_categories' ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ $admin_page == 'markers' ? 'active' : '' }}" href="{{ url('admin/markers') }}">
                <iconify-icon icon="mdi:location"></iconify-icon>
                Locations

              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ $admin_page == 'center_categories' ? 'active' : '' }}" href="{{ url('admin/center_categories') }}">
                <iconify-icon icon="mdi:office-building"></iconify-icon>

                Center Categories
              </a>
            </li>
          </ul>
        </li> -->




        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ $admin_page == 'blog' || $admin_page == 'blog_categories' ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:widget-4-line-duotone"></iconify-icon>
            <span class="hide-menu">Blog</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ $admin_page == 'blog' || $admin_page == 'blog_categories' ? 'in' : '' }}">
            <li class="sidebar-item">
              <a class="sidebar-link {{ $admin_page == 'blog' ? 'active' : '' }}" href="{{ url('admin/blog') }}">
                <span class="icon-small"></span>Blog
                Posts
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ $admin_page == 'blog_categories' ? 'active' : '' }}" href="{{ url('admin/blog_categories') }}">
                <span class="icon-small"></span>Blog
                Categories
              </a>
            </li>
          </ul>
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
          <a class="sidebar-link {{ $admin_page == 'contact' ? 'active' : '' }}" href="{{ url('admin/contact') }}" aria-expanded="false">
            <iconify-icon icon="tabler:message-user"></iconify-icon>
            <span class="hide-menu">Contact Messages</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ $admin_page == 'subscribers' ? 'active' : '' }}" href="{{ url('admin/subscribers') }}" aria-expanded="false">
            <iconify-icon icon="jam:newsletter"></iconify-icon>
            <span class="hide-menu">Subscribers</span>
          </a>
        </li>


      </ul>

    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>