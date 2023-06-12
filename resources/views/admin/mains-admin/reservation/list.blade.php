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
@section('content')
<h1>View équipe</h1>
<a class="btn btn-primary bt1" href="{{ route('show-reservation-add') }}"> Add Reservation</a>
<div class="card col-md-12 col-sm-12">
    <div class="card-body">
        <h5 class="card-title c1">liste Reservation</h5>
        <table class="table table-bordered mp-0 table-striped table-vcenter border-top text-nowrap">
            <thead>
                <tr>
                    <th>promoteur</th>
                    <th>client</th>
                    <th>reservation</th>
                    <th>Date Réservation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservation as $item)
                <tr>
                    <td>{{ $item->id_promoteur }}</td>
                    <td>{{ $item->id_client }}</td>
                    <td>{{ $item->annonce->Titre}}</td>
                    <td>{{ $item->Date }}</td>
                    <td width="20%">
                        <a href="{{ url('admin/Reservation/' . $item->id) }}" class="btn btn-info"> <i
                                class="fa fa-pencil" title="edite réservation"></i></a>
                        <a href="{{ url('admin/deleteReservation/' . $item->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash" title="delete réservation"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<!-- Row -->