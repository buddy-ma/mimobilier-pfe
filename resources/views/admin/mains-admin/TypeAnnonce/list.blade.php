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
    <h4 class="justify-content-center">Type d'annonce</h4>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title c1">liste Type annonce</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered mp-0 table-striped table-vcenter border-top text-nowrap">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Type as $item)
                        <tr>
                            <td>{{ $item->Titre}}</td>
                            <td width="20%">
                                <a href="{{ url('admin/Typeannonce/' . $item->id) }}" class="btn btn-info"> <i
                                        class="fa fa-pencil" title="edite Type"></i></a>
                                <a href="{{ url('admin/deleteTypeannonce/' . $item->id)}}" class="btn btn-danger"><i
                                        class="fa fa-trash" title="delete Type"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                @csrf
                <div class="card-body">
                    <h3 class="text-center">Insérer Type annonce</h3>
                    <form action="{{route('type-add')}}" method="post">
                        @csrf
                        <label for="titre">Titre Type</label>
                        <input type="text" class="form-control" name="Titre" placeholder="titre type annonce">
                        <br>
                        @error('Titre')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br><br>
                        <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter Type">
                    </form>
                </div>

            </div>


        </div>
    </div>
</div>


@endsection
<!-- Row -->