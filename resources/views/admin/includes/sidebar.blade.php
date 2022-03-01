<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ url('/admin/dashboard') }}"><img src="{{ asset('public/admin/images/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li><a href="{{ url('/admin/dashboard') }}"><i class="ti-dashboard"></i><span>dashboard</span></a></li>
                    <li><a href="{{ url('/admin/categories') }}"><i class="ti-package"></i> <span>Categories</span></a></li>
                    <li><a href="{{ url('/admin/services') }}"><i class="fa fa-tag"></i> <span>Services</span></a></li>
                    <li><a href="{{ url('/admin/add_extras') }}"><i class="ti-text"></i> <span>Add Extras</span></a></li>
                    <li><a href="{{ url('/admin/edit_profile') }}"><i class="ti-user"></i> <span>Edit Profile</span></a></li>
                    <br><br><br><br><br><br>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
