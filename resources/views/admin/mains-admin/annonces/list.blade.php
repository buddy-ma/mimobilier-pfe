@extends('admin.layouts.master')
@section('css')
    <style>
        h1,
        .c1 {
            text-align: center;
        }

        .bt1 {
            margin-left: 88%;
            margin-bottom: 5%;
        }
    </style>
@endsection
@section('page-header')
    <div class="page-header">
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row w-100">
                    <div class="col-4">
                        <h4 class="card-title" style="line-height: 2">Tous les annonces</h4>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <form action="/admin/annonces" method="get">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary box-shadow-0" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-primary float-right ml-auto" href="{{ route('show-annonce-add') }}"> add
                            annonce</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($annonces as $item)
                <div class="col-3">
                    <div class="card overflow-hidden">
                        <div class="card-header text-center">
                            <h5 class="card-title">{{ $item->Titre }}</h5>
                        </div>
                        <?php $firstImage = $item->getFirstImage(); ?>
                        @if ($firstImage)
                            <img src="{{ asset($firstImage->image) }}" class="card-image1" alt="annonce">
                        @endif
                        <div class="card-body">
                            <p class="card-text">{{ $item->Adresse }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('annonce-show', $item->id) }}" class="btn btn-primary mx-auto"><i
                                    class="fa fa-edit"></i></a>
                            <a href=" {{ route('annonce-delete', $item->id) }}" class="btn btn-danger mx-auto"
                                title="delete annonce"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<!-- Row -->
