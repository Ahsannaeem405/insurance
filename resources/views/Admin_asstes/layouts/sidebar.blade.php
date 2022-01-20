<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html">
                    <div class="" ></div>
                    {{-- <h2 class="brand-text mb-0">@if (isset(Auth::user()->name)) {{Auth::user()->name}} @endif</h2> --}}
                    <h2 class="brand-text mb-0">{{Auth::user()->name}}</h2>

                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              <li class=" navigation-header">.
            </li>
            <li class="@yield('dashboard')"><a href="{{url('admin/index')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>

            <li class="@yield('user')" ><a href="{{url('/admin/viewuser')}}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="profile">User</span></a>


            </li>



            <li class="@yield('subsription')"><a href="{{url('/admin/subscriptions')}}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="profile">Subscriptions</span></a>


            </li>



            <li class="@yield('coupan')"><a href="{{url('/admin/coupon')}}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="profile">Coupon </span></a>


            </li>

            <li class="@yield('setting')"><a href="{{url('/admin/setting')}}"><i class="fas fa-cog"></i></i><span class="menu-title" data-i18n="profile">Setting</span></a>


            </li>


            <li class="@yield('upload')"><a href="{{url('/admin/upload')}}"><i class="fas fa-cog"></i></i><span class="menu-title" data-i18n="profile">Upload Data</span></a>


            </li>























        </ul>
    </div>
</div>
