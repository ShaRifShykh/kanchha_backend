@extends("admin.layout.main")
@section("main-title", "Services - ")

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
                        <h4 class="page-title pull-left">Services</h4>
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


                <div class="col-lg-12 col-ml-12 mt-3">
                    <a href="{{ url('/admin/add_service') }}" >Add Service</a>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="row">
                                @foreach($services as $service)
                                    <div class="col-lg-4 col-md-6 mt-5">
                                        <div class="card card-bordered">
                                            <img class="card-img-top img-fluid" src="{{ asset('storage/app/public/'.$service->thumbnail) }}" alt="image">
                                            <div class="card-body">
                                                <h5 class="title">{{ $service->title }}</h5>
                                                <p class="card-text"><strong>Category: </strong>{{ $service->category->name }}<br>
                                                    <strong>Duration: </strong>{{ $service->duration }}<br>
                                                    <strong>Charges: </strong>Rs.{{ $service->charges }}</p>
                                                <p>{{ $service->short_description }}</p><br>
                                                <h5 class="title">Service Includes</h5>
                                                <ul>
                                                    @foreach($service->serviceIncludes as $service_include)
                                                        <li style="font-size: 12px">{{ $service_include->includes }}</li>
                                                    @endforeach
                                                </ul>
                                                <br>
                                                <h5 class="title">Service Excludes</h5>
                                                <ul>
                                                    @foreach($service->serviceExcludes as $service_exclude)
                                                        <li style="font-size: 12px">{{ $service_exclude->excludes }}</li>
                                                    @endforeach
                                                </ul>
                                                <br>
                                                <a href="{{ url('/admin/edit_service/'.$service->id) }}" class="btn btn-secondary">Edit</a>
                                                <a href="{{ url('/admin/delete_service/'.$service->id) }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
@endsection
