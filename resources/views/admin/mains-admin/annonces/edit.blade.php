@extends('admin.layouts.master')
@section('css')
<style>
h1,
.c1 {
    text-align: center;
}
</style>
@endsection

@section('content')
<div class="card col-md-12 col-sm-12 mt-5">
    <form action="{{route('annonce-update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $annonce->id }}">
        <div class="card-header">
            <div class="card-title">Modifier Annonce</div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <label for="titre">Titre annonce</label>
                    <input type="text" class="form-control" name="Titre" value="{{$annonce->Titre}}">
                </div>
                <div class="col-md-4">
                    <label for="type_id">Type annonce</label>
                    <input type="text" class="form-control" name="type_id" value="{{$annonce->type_id}}">
                </div>
                <div class="col-md-4">
                    <label for="id_promoteur">promoteur de l'annonce</label>
                    <input type="text" class="form-control" name="id_promoteur" value="{{$annonce->id_promoteur}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="id_ville">Ville annonce</label>
                    <input type="text" class="form-control" name="id_ville" value="{{$annonce->id_ville}}">
                </div>
                <div class="col-md-4">
                    <label for="id_quartier">Quartier annonce</label>
                    <input type="text" class="form-control" name="id_quartier" value="{{$annonce->id_quartier}}">
                </div>
                <div class="col-md-4">
                    <label for="Adresse">Adresse annonce</label>
                    <input type="text" class="form-control" name="Adresse" value="{{$annonce->Adresse}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="extras">Extras annonce</label>
                    <input type="text" class="form-control" name="extras" value="{{$annonce->extras}}">
                </div>
                <div class="col-md-4">
                    <label for="Position">Position</label>
                    <input type="text" class="form-control" name="Position" value="{{$annonce->Position}}">
                </div>
                <div class="col-md-4">
                    <label for="surface">surface</label>
                    <input type="text" class="form-control" name="surface" value="{{$annonce->surface}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="nbr_chambres">nombre chambres</label>
                    <input type="text" class="form-control" name="nbr_chambres" value="{{$annonce->nbr_chambres}}">
                </div>
                <div class="col-md-4">
                    <label for="prix">prix</label>
                    <input type="text" class="form-control" name="prix" value="{{$annonce->prix}}">
                </div>
                <div class="col-md-4">
                    <label for="Status">Status</label>
                    <input type="text" class="form-control" name="Status" value="{{$annonce->Status}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="is_dispo">disponibilité</label>
                    <input type="text" class="form-control" name="is_dispo" value="{{$annonce->is_dispo}}">
                </div>
                <div class="col-md-4">
                    <label for="is_sponsorised">sponsorisation</label>
                    <input type="text" class="form-control" name="is_sponsorised" value="{{$annonce->is_sponsorised}}">
                </div>
                <div class="col-md-4">
                    <label for="Status">vues</label>
                    <input type="text" class="form-control" name="vues" value="{{$annonce->vues}}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-rounded btn-primary" value="modifier Annonce">
        </div>
    </form>
</div>
<div class="card col-md-12 col-sm-12 mt-5">
    <div class="card-header">
        <div class="card-title">Modifier images Annonce</div>
    </div>
    <div class="card-body">
        <form action="{{route('annonce-ImagesUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row row-sm">
                @foreach($annonceImages as $imgs)
                <div>
                    <div class=" card col-md-12">
                        <img src="{{asset($imgs->image)}}" class="card-img-top" style="width:330px; height:150px;">
                        <br>
                        <div class=" row justify-content-center">
                            <h5 class="col-md-3 ">
                                <a href=" {{route('images-delete',$imgs->id)}}" class="btn btn-sm btn-danger"
                                    title="delete image"><i class="fa fa-trash"></i></a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <input type="file" class="custom-file-input" name="images[{{$imgs->id}}]">
                                <label class="custom-file-label" for="images[{{$imgs->id}}]">Choisire Images</label>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="modifier image">
            </div>
        </form>

    </div>
</div>
@endsection



<!-- Row -->