@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Portfolio Update Page</h4>
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('all.portfolio') }}">All Portfolio</a></li>
                            <li class="breadcrumb-item active text-info">Portfolio Update Page</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio Update Page </h4>

                        <form method="post" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <input type="hidden" name="id" value="{{ $portfolio->id }}">


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Update Name</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_name" class="form-control" type="text" value="{{ $portfolio->portfolio_name }}" id="example-text-input">
                                        @error('portfolio_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_title" class="form-control" type="text" value="{{ $portfolio->portfolio_title }}" id="example-text-input">
                                        @error('portfolio_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description </label>
                                <div class="col-sm-10">
                                <textarea id="elm1" name="portfolio_description">
                                    {!! $portfolio->portfolio_description !!}
                                </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image </label>
                                <div class="col-sm-10">
                                <input name="portfolio_image" class="form-control"  type="file" id="image">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ asset($portfolio->portfolio_image) }}" alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio Page">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
