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
    <form action="{{route('reservation-update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $reservation->id }}">
        <div class="card-header">
            <div class="card-title text-center">modifier Reservation</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="titre">promoteur de réservation</label>
                    <input type="text" class="form-control" name="id_promoteur" value="{{$reservation->id_promoteur}}">
                </div>
                <div class="col-md-6">
                    <label for="id_client">Réservateur</label>
                    <input type="text" class="form-control" name="id_client" value="{{$reservation->id_client}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Reservation</label>
                    <select name="id_annonce" class="form-control">
                        <option value="">Select Reservation</option>
                        @foreach($annonce as $item)
                        <option value="{{$item->id}}" {{$item->id==$reservation->id_annonce ?'selected':''}}>
                            {{$item->Titre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="Date">Date de réservation</label>
                    <input type="datetime-local" class="form-control" name="Date" value="{{$reservation->Date}}">
                </div>
            </div>
            <br>
        </div>
        <div class=" card-footer">
            <input type="submit" class="btn btn-rounded btn-primary" value="modifier réservation">
        </div>
    </form>
</div>
@endsection



<!-- Row -->