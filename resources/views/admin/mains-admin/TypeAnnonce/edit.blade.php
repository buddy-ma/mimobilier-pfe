@extends('admin.layouts.master')
@section('css')
<style>
h1,
.c1 {
    text-align: center;
}
</style>
@endsection
@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">update Type</h4>
    </div>
</div>
@endsection
@section('content')
<form action="{{ route('type-update', $Type->id) }}" method="post">
    @csrf
    <div class="card col-md-12 col-sm-12">
        <div class="card-body">
            <input type="hidden" name="id" value="{{ $Type->id}}">
            <div class="row">
                <div class="col-lg mb-3">
                    <label class="form-label">Titre Type</label>
                    <input type="text" class="form-control" name="Titre" value="{{ $Type->Titre }}">
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-rounded btn-primary float-right ml-auto" value="update Type">
                </div>
            </div>
</form>
@endsection
<!-- Row -->