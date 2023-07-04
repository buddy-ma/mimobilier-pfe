@extends('admin.layouts.master')
@section('css')
    <!-- Data table css -->
    <link href="{{ URL::asset('admin_assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin_assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin_assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
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
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title c1">liste Type annonce</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Titre</th>
                                    <th class="wd-15p border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Type as $item)
                                    <tr>
                                        <td>{{ $item->Titre }}</td>
                                        <td width="20%">
                                            <a href="{{ url('admin/Typeannonce/' . $item->id) }}" class="btn btn-info"> <i
                                                    class="fa fa-pencil" title="edite Type"></i></a>
                                            <a href="{{ url('admin/deleteTypeannonce/' . $item->id) }}"
                                                class="btn btn-danger"><i class="fa fa-trash" title="delete Type"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title c1">Insérer Type annonce</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('type-add') }}" method="post">
                        @csrf
                        <label for="titre">Titre Type</label>
                        <input type="text" class="form-control" name="Titre" placeholder="titre type annonce">
                        <br>
                        @error('Titre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br><br>
                        <input type="submit" class="btn btn-rounded btn-primary" value="Ajouter Type">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Row -->
@section('js')
    <!-- INTERNAL Data tables -->
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/datatables.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ URL::asset('admin_assets/plugins/select2/select2.full.min.js') }}"></script>
@endsection
