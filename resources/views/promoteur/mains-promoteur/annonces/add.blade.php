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
    <form action="{{route('annoncepromo-add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="card-title text-center">Ajouter annonce</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="file" class="custom-file-input" name="images[]" id="image" multiple="">
                    <label class="custom-file-label" for="images">Choisire Images</label>
                    @error('images')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6" id="previewContainer">
                    <!-- <img src="" id="showImage" width="100px" height="100px" alt=""> -->
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label for="titre">Titre annonce</label>
                    <input type="text" class="form-control" name="Titre" placeholder="titre annonce">
                    @error('Titre')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Type annonce</label>
                    <select name="type_id" class="form-control">
                        <option value="">Select Type</option>
                        @foreach ($Type as $item)
                        <option value="{{ $item->id }}">{{ $item->Titre }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">promoteur de l'annonce</label>
                    <select name="id_promoteur" class="form-control">
                        <option value="">Select promoteur</option>
                        <option value="{{Auth()->id}}">{{Auth()->name}}</option>
                    </select>
                    @error('id_promoteur')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Ville annonce</label>
                    <select name="id_ville" class="form-control">
                        <option value="">Select Ville</option>
                        @foreach ($ville as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('id_ville')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Quartier annonce</label>
                    <select name="id_quartier" class="form-control">
                        <option value="">Select quartier</option>
                        @foreach ($quartier as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('id_quartier')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Adresse">Adresse annonce</label>
                    <input type="text" class="form-control" name="Adresse" placeholder="Adresse">
                    @error('Adresse')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="extras">Extras annonce</label>
                    <input type="text" class="form-control" name="extras" placeholder="extras">
                    @error('extras')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="Position">Position</label>
                    <input type="text" class="form-control" name="Position" placeholder="Position">
                    @error('Position')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="surface">surface</label>
                    <input type="text" class="form-control" name="surface" placeholder="surface">
                    @error('surface')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="nbr_chambres">nombre chambres</label>
                    <input type="text" class="form-control" name="nbr_chambres" placeholder="nombre chambres">
                    @error('nbr_chambres')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="prix">prix</label>
                    <input type="text" class="form-control" name="prix" placeholder="prix">
                    @error('prix')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status annonce</label>
                    <select name="Status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Desactive</option>
                    </select>
                    @error('Status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">disponibilité</label>
                    <select name="is_dispo" class="form-control">
                        <option value="">Select disponibilité</option>
                        <option value="1">disponible</option>
                        <option value="0">non</option>
                    </select>
                    @error('is_dispo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">sponsorisation</label>
                    <select name="is_sponsorised" class="form-control">
                        <option value="">Select sponsorisation</option>
                        <option value="1">sponsorisé</option>
                        <option value="0">non</option>
                    </select>
                    @error('is_sponsorised')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="vues">vues</label>
                    <input type="text" class="form-control" name="vues" placeholder="vues">
                    @error('vues')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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