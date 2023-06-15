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
<h1>View paiement</h1>
<a class="btn btn-primary bt1" href="{{ route('show-paiement-add') }}"> Add paiement</a>
<div class="card col-md-12 col-sm-12">
    <div class="card-body">
        <h5 class="card-title c1">liste paiements</h5>
        <table class="table table-bordered mp-0 table-striped table-vcenter border-top text-nowrap">
            <thead>
                <tr>
                    <th>nom de opération</th>
                    <th>client</th>
                    <th>annonce</th>
                    <th>montant de paiement</th>
                    <th>date de paiement</th>
                    <th>photo_virement</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paiement as $item)
                <tr>
                    <td>{{ $item->nom_opération }}</td>
                    <td>{{ $item->id_client }}</td>
                    <td>{{ $item->id_annonce}}</td>
                    <td>{{ $item->montant_paiement }}</td>
                    <td>{{ $item->date_paiement }}</td>
                    <td>
                        <img src="{{asset($item->photo_virement)}}" alt="virement image"
                            style="width:200px; height:200px;">
                    </td>
                    <td width="20%">
                        <a href="{{ url('admin/paiement/' . $item->id) }}" class="btn btn-info"> <i class="fa fa-pencil"
                                title="edite paiement"></i></a>
                        <a href="{{ url('admin/deletepaiement/' . $item->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash" title="delete paiement"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<!-- Row -->