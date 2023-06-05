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
    <form action="{{route('annonce-add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="card-title text-center">Ajouter annonce</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="file" class="custom-file-input" name="images[]" id="image" multiple="">
                    <label class="custom-file-label" for="images">Choisire Images</label>
                </div>
                <div class="col-md-6" id="previewContainer">
                    <!-- <img src="" id="showImage" width="100px" height="100px" alt=""> -->
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label for="titre">Titre annonce</label>
                    <input type="text" class="form-control" name="Titre" placeholder="titre annonce">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Type annonce</label>
                    <select name="type_id" class="form-control">
                        <option value="">Select Type</option>
                        @foreach ($Type as $item)
                        <option value="{{ $item->id }}">{{ $item->Titre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="id_promoteur">promoteur de l'annonce</label>
                    <input type="text" class="form-control" name="id_promoteur" placeholder="promoteur">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="id_ville">Ville annonce</label>
                    <input type="text" class="form-control" name="id_ville" placeholder="ville">
                </div>
                <div class="col-md-4">
                    <label for="id_quartier">Quartier annonce</label>
                    <input type="text" class="form-control" name="id_quartier" placeholder="quartier">
                </div>
                <div class="col-md-4">
                    <label for="Adresse">Adresse annonce</label>
                    <input type="text" class="form-control" name="Adresse" placeholder="Adresse">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="extras">Extras annonce</label>
                    <input type="text" class="form-control" name="extras" placeholder="extras">
                </div>
                <div class="col-md-4">
                    <label for="Position">Position</label>
                    <input type="text" class="form-control" name="Position" placeholder="Position">
                </div>
                <div class="col-md-4">
                    <label for="surface">surface</label>
                    <input type="text" class="form-control" name="surface" placeholder="surface">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="nbr_chambres">nombre chambres</label>
                    <input type="text" class="form-control" name="nbr_chambres" placeholder="nombre chambres">
                </div>
                <div class="col-md-4">
                    <label for="prix">prix</label>
                    <input type="text" class="form-control" name="prix" placeholder="prix">
                </div>
                <div class="col-md-4">
                    <label for="Status">Status</label>
                    <input type="text" class="form-control" name="Status" placeholder="Status">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="is_dispo">disponibilité</label>
                    <input type="text" class="form-control" name="is_dispo" placeholder="disponibilité">
                </div>
                <div class="col-md-4">
                    <label for="is_sponsorised">sponsorisation</label>
                    <input type="text" class="form-control" name="is_sponsorised" placeholder="sponsorisation">
                </div>
                <div class="col-md-4">
                    <label for="Status">vues</label>
                    <input type="text" class="form-control" name="vues" placeholder="vues">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter Annonce">
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
                var imgElement = $('<img>').attr('src', imageSrc).css('width', '100px');
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