@extends('admin.layouts.master')
@section('css')
    <!-- INTERNAL File Uploads css -->
    <link href="{{ URL::asset('admin_assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- INTERNAL File Uploads css-->
    <link href="{{ URL::asset('admin_assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .bootstrap-tagsinput {
            width: 100% !important;
        }

        .dark-mode .bootstrap-tagsinput {

            color: rgba(255, 255, 255, 1) !important;
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dark-mode .bootstrap-tagsinput input {
            color: rgba(255, 255, 255, 1) !important;
        }
    </style>
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Blogs</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fe fe-layout  mr-2 fs-14"></i>Blogs</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">My Blogs</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <div class="card overflow-hidden">
        @isset($blog->image)
            <div class="item7-card-img px-4 pt-4">
                <img src="{{ URL::asset('images/' . $blog->image) }}" alt="img" class="cover-image br-7 w-100">
            </div>
        @endisset
        <div class="card-body">
            <div class="item7-card-desc d-md-flex mb-5">
                <i class="fe fe-calendar fs-16 mr-1"></i>
                <div class="mt-0">{{ $blog->created_at->format('F-j-Y') }}</div>
                <div class="ml-auto mb-2">
                    <a class="mr-0 d-flex" href="{{ url('/' . ($page = '#')) }}"><i
                            class="fe fe-message-square fs-16 mr-1"></i>
                        <div class="mt-0">{{ $blog->created_at->diffForHumans() }}</div>
                    </a>
                </div>
            </div>
            <h5 class="font-weight-semibold">{{ $blog->title }}</h5>
            <h6 class="font-weight-semibold">{{ $blog->subtitle }}</h6>
            {!! $blog->text !!}
            <div class="media py-3 mt-0 border-top">
                <div class="tags">
                    @foreach ($tags as $tag)
                        <span class="tag tag-purple">{{ $tag }}</span>
                    @endforeach
                </div>
                <div class="ml-auto">
                    <div class="d-flex">
                        @livewire('blogs-listing', ['model' => $blog, 'field' => 'status'], key($blog->id))
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- INTERNAL File uploads js -->
    <script src="{{ URL::asset('admin_assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/filupload.js') }}"></script>

    <!--INTERNAL Form Advanced Element -->
    <script src="{{ URL::asset('admin_assets/js/formelementadvnced.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/form-elements.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/file-upload.js') }}"></script>

    <!-- INTERNAL Datepicker js -->
    <script src="{{ URL::asset('admin_assets/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>
@endsection
