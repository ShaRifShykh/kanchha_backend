@extends("admin.layout.main")
@section("main-title", "Edit Category - ")

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
                        <h4 class="page-title pull-left">Edit Category</h4>
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
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="card">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="card-body" method="POST" action="{{ url('/admin/update_category') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control" type="number" readonly hidden required name="id" value="{{ $category->id }}">
                                    <div class="form-group text-center">
                                        <div id="profile-container">
                                            <img style="border-radius: 10px; width: 300px; height: 100px" class="img-fluid" id="profileImage" src="https://via.placeholder.com/300x100" alt="Img Not Found" />
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="background_image" id="imageUpload">
                                            <label class="custom-file-label" for="imageUpload">Choose
                                                Background Image</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-name-input" class="col-form-label">Name</label>
                                        <input class="form-control" type="text"
                                               id="example-name-input" name="name" value="{{ $category->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email-input" class="col-form-label">Short Description</label>
                                        <textarea class="form-control" name="short_description"
                                                  id="example-email-input">{{ $category->short_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Edit Category" class="btn btn-primary" name="submit" >
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

@section("main-script")
    <script>
        $("#profileImage").click(function(e) {
            $("#imageUpload").click();
        });

        function fasterPreview( uploader ) {
            if ( uploader.files && uploader.files[0] ){
                $('#profileImage').attr('src',
                    window.URL.createObjectURL(uploader.files[0]) );
            }
        }

        $("#imageUpload").change(function(){
            fasterPreview( this );
        });
    </script>
@endsection
