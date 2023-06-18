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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="card col-md-12 col-sm-12 mt-5">
    <form action="{{route('paiementpromo-add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="card-title text-center">Ajouter paiement</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="titre">nom_opération</label>
                    <input type="text" class="form-control" name="nom_opération" placeholder="nom  de l'operation">
                    @error('nom_opération')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="id_client">nom client</label>
                    <input type="text" class="form-control" name="id_client" placeholder="nom client">
                    @error('id_client')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="id_annonce">nom annonce</label>
                    <input type="text" class="form-control" name="id_annonce" placeholder="nom annonce">
                    @error('id_annonce')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="montant_paiement">montant de paiement</label>
                    <input type="number" class="form-control" name="montant_paiement" placeholder="montant de paiement">
                    @error('montant_paiement')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="date_paiement">date de paiement</label>
                    <input type="date" class="form-control" name="date_paiement">
                    @error('date_paiement')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6" id="previewContainer">

                </div>
                <div class="col-md-6">
                    <label for="photo_virement">photo de virement</label>
                    <input type="file" class="form-control" name="photo_virement" id="image">
                    @error('photo_virement')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter un paiement">
        </div>
    </form>
</div>
<script type="text/javascript">
// $(document).ready(function() {
//     $('#image').change(function(e) {
//         var reader = new FileReader();
//         reader.onload = function(e) {
//             $('#showImage').attr('src', e.target.result);
//         }
//         reader.readAsDataURL(e.target.files['0']);

//     });

// });
$(document).ready(function() {
    $('#image').change(function(e) {
        var files = e.target.files;
        var label = $('.custom-file-label');
        label.text(files.length + " fichier(s) choisir");
        var previewContainer = $('#previewContainer');
        previewContainer.empty(); // Clear previous previews

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageSrc = e.target.result;
                var imgElement = $('<img>').attr('src', imageSrc).css('width', '300px');
                previewContainer.append(imgElement);
            };
            reader.readAsDataURL(files[i]);
        }
        previewContainer.css('display', 'flex');
    });
});
</script>
@endsection



<!-- Row -->