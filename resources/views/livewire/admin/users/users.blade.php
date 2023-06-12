<div>
    <div wire:loading
        style="width:100%;height:100%;background-color:rgb(238, 231, 255,0.5);position: absolute;
    z-index: 10000;
    right: 0;
    left: 0;
    ">
        <div class='dot-spin' style="top:50%;margin:auto"></div>
    </div>

    <div>
        {{-- Do your work, then step back. --}}
        @if ($ShowAddUser == true)
            @include('livewire.admin.users.user-add')
        @elseif($ShowupdateUser == true)
            @include('livewire.admin.users.user-update')
        @endif

        <div class="row flex-lg-nowrap">
            <div class="col-12 mb-3">
                <div class="e-panel card">
                    <div class="card-header">
                        <h3 class="card-title">All Users</h3>
                        @can('user-create')
                            <button type="button" class="btn btn-primary mb-1 ml-auto float-right"
                                wire:click="ShowAddUser()">
                                <i class="fe fe-plus mr-2"></i>Add User
                            </button>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12">
                            <div id="example1_filter" class="dataTables_filter">
                                <label class="float-right ml-3">
                                    <button class="btn btn-danger form-control-sm" wire:click="resetFilters">
                                        <i class="fa fa-close" style="line-height: 20px"></i>
                                    </button>
                                </label>
                                <label class="float-right"><input class="form-control form-control-sm"
                                        placeholder="Search..." wire:model='search_user'></label>


                            </div>
                        </div>
                        <div class="e-table">
                            <div class="table-responsive table-lg mt-3">
                                <table
                                    class="table table-bordered mp-0 table-striped table-vcenter border-top text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Id</th>
                                            <th class="wd-15p border-bottom-0">First Name</th>
                                            <th class="wd-15p border-bottom-0">Last Name</th>
                                            <th class="wd-15p border-bottom-0">Email</th>
                                            <th class="wd-15p border-bottom-0">Phone</th>
                                            <th class="wd-15p border-bottom-0">Roles</th>
                                            <th class="wd-15p border-bottom-0">status</th>
                                            <th class="wd-15p border-bottom-0">Created At</th>
                                            <th class="wd-20p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="change-user">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->firstname }}</td>
                                                <td>{{ $user->lastname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $role)
                                                            <label
                                                                class="badge badge-success">{{ $role }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->status == 0)
                                                        <button class="btn-sm btn-danger mt-2"
                                                            wire:click="toDesable({{ $user->id }})"
                                                            id="Desable">Disabled</button>
                                                    @else
                                                        <button class="btn-sm btn-success mt-2"
                                                            wire:click="toDesable({{ $user->id }})"
                                                            id="Desable">Enabled</button>
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td class="align-middle">
                                                    <div class="btn-group align-top">
                                                        @if ($confirming === $user->id)
                                                            <button type="button" class="btn btn-icon  btn-primary"
                                                                wire:click.prevent="deleteUser({{ $user->id }})"><i
                                                                    class="fe fe-check"></i></button>
                                                            <button type="button" class="btn btn-icon  btn-danger"
                                                                wire:click.prevent="Canceldelete()"><i
                                                                    class="fe fe-x"></i></button>
                                                        @else
                                                            <button type="button" class="btn btn-icon  btn-info mr-1"
                                                                wire:click.prevent="UserShow({{ $user->id }})"><i
                                                                    class="fe fe-edit"></i></button>
                                                            <button type="button" class="btn btn-icon  btn-danger"
                                                                wire:click.prevent="confirmdelete({{ $user->id }})"><i
                                                                    class="fe fe-trash"></i></button>
                                                        @endif


                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $users->links() }}
                            </div>
                        </div>
                        <!--/div-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
