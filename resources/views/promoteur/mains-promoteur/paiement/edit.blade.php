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
    <form action="{{route('paiementpromo-update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$paiement->id}}">
        <div class="card-header">
            <div class="card-title text-center">modifier paiement</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="titre">nom_opération</label>
                    <input type="text" class="form-control" name="nom_opération" value="{{$paiement->nom_opération}}">
                </div>
                <div class="col-md-4">
                    <label for="id_client">nom client</label>
                    <input type="text" class="form-control" name="id_client" value="{{$paiement->id_client}}">
                </div>
                <div class="col-md-4">
                    <label for="id_annonce">nom annonce</label>
                    <input type="text" class="form-control" name="id_annonce" value="{{$paiement->id_annonce}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="montant_paiement">montant de paiement</label>
                    <input type="number" class="form-control" name="montant_paiement"
                        value="{{$paiement->montant_paiement}}">
                </div>
                <div class="col-md-6">
                    <label for="date_paiement">date de paiement</label>
                    <input type="date" class="form-control" name="date_paiement" value="{{$paiement->date_paiement}}">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label for="photo_virement">photo de virement</label>
                    <input type="file" class="form-control" name="photo_virement">
                </div>
                <div class="col-md-6">
                    <img src="{{asset($paiement->photo_virement)}}" style="width:300px; height:200px;"
                        alt="photo virement">
                </div>
            </div>
            <br>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter un paiement">
        </div>
    </form>
</div>
@endsection



<!-- Row -->