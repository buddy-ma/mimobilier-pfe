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
    <form action="{{route('reservation-add')}}" method="post">
        @csrf
        <div class="card-header">
            <div class="card-title text-center">Ajouter Reservation</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="titre">promoteur de réservation</label>
                    <input type="text" class="form-control" name="id_promoteur" placeholder="promoteur de réservation">
                    @error('id_promoteur')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="id_client">Réservateur</label>
                    <input type="text" class="form-control" name="id_client" placeholder="reservateur">
                    @error('id_promoteur')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Reservation</label>
                    <select name="id_annonce" class="form-control">
                        <option value="">Select Reservation</option>
                        @foreach($annonce as $item)
                        <option value="{{$item->id}}">{{$item->Titre}}</option>
                        @endforeach
                    </select>
                    @error('id_annonce')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="Date">Date de réservation</label>
                    <input type="datetime-local" class="form-control" name="Date">
                    @error('Date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <br>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter une réservation">
        </div>
    </form>
</div>
@endsection



<!-- Row -->