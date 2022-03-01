@extends("admin.layout.main")
@section("main-title", "Categories - ")

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
                        <h4 class="page-title pull-left">Categories</h4>
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
                    <a href="{{ url('/admin/add_category') }}" >Add Category</a>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="row">
                                @foreach($categories as $category)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <a href="#exampleModalLong{{$category->id}}" data-toggle="modal" data-target="#exampleModalLong{{$category->id}}">
                                            <div style="background-image: url({{ asset('storage/app/public/'.$category->background_image) }}); padding: 15px; background-size: cover; border-radius: 15px" class="img-fluid">
                                                <h5 class="text-dark">{{ $category->name }}</h5>
                                                <p>{{ $category->short_description }}</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="modal fade" id="exampleModalLong{{$category->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Category Actions</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a type="button" href="{{ url('/admin/edit_category/'.$category->id) }}" class="btn btn-primary">Edit</a>
                                                    <a type="button" href="{{ url('/admin/delete_category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                                                </div>
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
