<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="{{route('dashboard')}}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
          </a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="{{ route('dashboard')}}" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face1.jpg" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2">{{ Auth::user()->name }}</span>
                <!-- <span class="font-weight-normal">$8,753.00</span> -->
              </div>
              <!-- <span class="badge badge-danger text-white ml-3 rounded">3</span> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Product Related</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category_group_list')}}">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Category Group</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category_list')}}">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('brand_list')}}">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Brand</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('product_list') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">User management </span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user_list') }}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <div class="border-none">
                  <p class="text-black">Setting</p>
                </div>
                <ul class="mt-4 pl-0">
                  <i class="mdi mdi-settings menu-icon"></i>
                  <span>Site Setting</span>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>