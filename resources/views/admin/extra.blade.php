@extends("admin.layout.main")
@section("main-title", "Add Extras - ")

@section("main-content")
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Add Extras</h4>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb img-fluid" src="{{ asset('storage/app/public/'.\Illuminate\Support\Facades\Auth::guard("admin")->user()->profile_picture) }}" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ \Illuminate\Support\Facades\Auth::guard("admin")->user()->full_name }} <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/admin/edit_profile') }}">Settings</a>
                            <a class="dropdown-item" href="{{ url('/admin/logout') }}">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page title area end -->
        <div class="main-content-inner">
            <div class="row">
                <div class="col-lg-12 col-ml-12">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="card">
                                <form class="card-body" method="POST" action="{{ url('/admin/add_extra') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="header-title">Add Phone No and Email</h4>
                                    <div class="form-group">
                                        <label for="example-phone_no-input" class="col-form-label">Phone No</label>
                                        <input class="form-control" type="tel" value="{{ $extra->phone_no }}"
                                               id="example-phone_no-input" name="phone_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email-input" class="col-form-label">Email</label>
                                        <input class="form-control" type="email" value="{{ $extra->email }}"
                                               id="example-email-input" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Extra" class="btn btn-primary" name="submit" >
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="card">
                                <form class="card-body" method="POST" action="{{ url('/admin/add_about_us') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="header-title">Add About Us</h4>
                                    <div class="form-group">
                                        <textarea rows="10" class="form-control" name="about_us">{{ $extra->about_us }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add About Us" class="btn btn-primary" name="submit" >
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="card">
                                <form class="card-body" method="POST" action="{{ url('/admin/add_privacy_policy') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="header-title">Add Privacy Policy</h4>
                                    <div class="form-group">
                                        <textarea rows="10" class="form-control" name="privacy_policy">{{ $extra->privacy_policy }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Privacy Policy" class="btn btn-primary" name="submit" >
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="card">
                                <form class="card-body" method="POST" action="{{ url('/admin/add_terms_and_conditions') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="header-title">Add Terms And Conditions</h4>
                                    <div class="form-group">
                                        <textarea rows="10" class="form-control" name="terms_and_conditions">{{ $extra->terms_and_conditions }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Terms And Conditions" class="btn btn-primary" name="submit" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
@endsection
