<div>

    <div class="row flex-lg-nowrap">
        <div class="col-12 mb-3">
            <div class="e-panel card">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">

                    <div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert"><button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ $message }}.
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div>
                                <strong class="text-danger">Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form>
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="expanel expanel-default">
                                    <div class="expanel-heading">
                                        <h3 class="expanel-title" style="text-align: center">User Personal Information
                                            &nbsp
                                        </h3>
                                    </div>
                                    <div class="expanel-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control mb-4" placeholder="First Name" type="text"
                                                    wire:model.defer='firstname' value='{{ old('firstname') }}'>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control mb-4" placeholder="Last Name" type="text"
                                                    wire:model.defer='lastname' value='{{ old('lastname') }}'>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Email</label>
                                                <input class="form-control mb-4" placeholder="Email" type="text"
                                                    wire:model.defer='email' value='{{ old('email') }}'>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Phone </label>
                                                <input class="form-control mb-4" placeholder="Phone" type="text"
                                                    wire:model.defer='phone' value='{{ old('phone') }}'>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div class="input-group file-browser mb-3">
                                                    <label class="form-label d-block w-100">Image </label>
                                                    <input type="text"
                                                        @if (!$avatar) placeholder="choose" @else placeholder="selected &#x2713;" @endif
                                                        readonly="" class="form-control border-right-0 browse-file">
                                                    <label class="input-group-btn">
                                                        <span class="btn btn-primary">Browse
                                                            <input type="file" style="display: none;"
                                                                wire:model='avatar'>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group ">
                                                    <label class="form-label">Password </label>
                                                    @if ($showpassword)
                                                        <input type="text" wire:model.defer="password"
                                                            class="form-control  @error('password') is-invalid @enderror"
                                                            placeholder="Password *">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <a wire:click="showpassword()"><i
                                                                        class="fe fe-eye"></i></a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <input type="password" wire:model.defer="password"
                                                            class="form-control  @error('password') is-invalid @enderror"
                                                            placeholder="Password *">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <a wire:click="showpassword()"><i
                                                                        class="fe fe-eye-off"></i></a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <a wire:click="rand_string()"><i
                                                                    class="fe fe-refresh-ccw"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="expanel expanel-default">
                                    <div class="expanel-heading">
                                        <h3 class="expanel-title" style="text-align: center">Roles
                                            &nbsp
                                        </h3>
                                    </div>
                                    <div class="expanel-body" style="max-height: 376px; overflow-y:scroll">
                                        <div class="e-table">
                                            <div class="table-responsive table-lg mt-3">
                                                <table
                                                    class="table table-bordered mp-0 table-striped table-vcenter border-top text-nowrap">
                                                    <tbody>
                                                        @foreach ($roles as $role)
                                                            <tr>
                                                                <td width='10px'><label
                                                                        class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="example-checkbox1"
                                                                            value="{{ $role->name }}"
                                                                            wire:model.defer="select.{{ $role->name }}">
                                                                        <span class="custom-control-label"></span>
                                                                    </label></td>
                                                                <td width='50px'>{{ $loop->index + 1 }}
                                                                </td>
                                                                <td>{{ $role->name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="button" wire:click="UserUpdate()" class="btn btn-primary mt-2 mb-2 ml-2 ">
                        Save</button>
                    <button type="button" wire:click="Close()" class="btn btn-danger">
                        Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $('#select2-dropdown').select2();
        });
    </script>
@endpush
