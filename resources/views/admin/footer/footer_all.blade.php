@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Footer Page</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-info">Footer Page</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('update.footer') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $allfooter->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input name="number" class="form-control" type="text" value="{{ $allfooter->number }}"  id="example-text-input">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description </label>
                                <div class="col-sm-10">
                                    <textarea required="" name="short_description"  class="form-control" rows="5">
                                {{ $allfooter->short_description }}
                                    </textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  Email</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{ $allfooter->email }}"  id="example-text-input">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input name="facebook" class="form-control" type="text" value="{{ $allfooter->facebook }}"  id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input name="twitter" class="form-control" type="text" value="{{ $allfooter->twitter }}"  id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input name="copyright" class="form-control" type="text" value="{{ $allfooter->copyright }}"  id="example-text-input">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer Page">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
