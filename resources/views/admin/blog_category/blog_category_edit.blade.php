@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Blog Category Page </h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('all.blog.category') }}">All Blog Category</a></li>
                        <li class="breadcrumb-item active text-info">Edit Blog Category Page </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('update.blog.category', $blogcategory->id) }}">
                            @csrf
                            {{-- @method('post') --}}

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Edit Category Name</label>
                                    <div class="col-sm-10">
                                        <input name="blog_category" class="form-control" type="text" value="{{ $blogcategory->blog_category }}" id="example-text-input">
                                            @error('blog_category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog Category">
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
