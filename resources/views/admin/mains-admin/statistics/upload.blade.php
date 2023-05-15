@extends('admin.layouts.master')
@section('css')
    <link href="{{ URL::asset('admin_assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin_assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Upload a file</h4>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Upload a file</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('upload.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg">
                                <label>File*</label>
                                <input type="file" class="dropify" data-height="180" name="file" />
                            </div>

                            <div class="col-lg">
                                <button name="action" type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('admin_assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/filupload.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/file-upload.js') }}"></script>
@endsection
