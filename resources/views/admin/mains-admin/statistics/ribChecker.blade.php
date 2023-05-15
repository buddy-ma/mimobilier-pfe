@extends('admin.layouts.master')
@section('css')
    <link href="{{ URL::asset('admin_assets/plugins/select2/select2.min.css') }} " rel="stylesheet" />
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Check a Rib or Iban</h4>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @livewire('modal-rib')
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Validate a rib</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('validate.rib') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Rib*</label>
                                <div class="input-group">
                                    <input type="text" name="rib" class="form-control" placeholder="Rib" required>
                                    <span class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                @livewire('validate-iban')
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('admin_assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/js/select2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#bank_id').on('change', function(e) {
                var data = $('#bank_id').select2("val");
                livewire.emit('getBank', data);
            });

            $('#city_id').on('change', function(e) {
                var dataa = $('#city_id').select2("val");
                livewire.emit('getSwift', dataa);
            });

            window.addEventListener('changeBackCitys', event => {
                var banks_citys = event.detail.banks_citys;
                $('#city_id')
                    .empty()
                    .append("<option value=''>Select a city </option>")
                    .append($.map(banks_citys, (v, k) => $("<option>").val(v['city']).text(v['city'])));
            });
        });
    </script>
@endsection
