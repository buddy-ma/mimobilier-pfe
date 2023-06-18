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
    <h4 class="justify-content-center">Tous les annonces</h4>
    <a class="btn btn-primary float-right ml-auto" href="{{ route('show-annonce-add') }}"> add annonce</a>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title c1">liste annonces</h3>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($annonces as $item)

            <div class="card col-md-3 ml-3">
                <?php $firstImage = $item->getFirstImage(); ?>
                @if ($firstImage)
                <img src="{{ asset($firstImage->image) }}" class="card-img-top" alt="annonce"
                    style="width:300px; height:150px;">
                @endif
                <!-- <img src="/admin_assets/images/annonces/exemple.jpg"> -->
                <div class="card-body">
                    <h5 class="card-title">{{$item->Titre}}</h5>
                    <p class="card-text">{{$item->Adresse}}</p>
                    <div class="row justify-content-center"><a href="{{route('annoncepromo-show',$item->id)}}"
                            class="btn btn-primary mx-auto">modifier
                            annonce</a>
                        <a href=" {{route('annoncepromo-delete',$item->id)}}" class="btn btn-sm btn-danger"
                            title="delete annonce"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>


    @endsection
    <!-- Row -->