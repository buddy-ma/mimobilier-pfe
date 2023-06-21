<div>
    <div class="row flex-lg-nowrap mt-5">
        <div class="col-12">
            @if (Session::get('success'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">×</button>
                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>{{ Session::get('success') }}
                </div>
            @endif
            <div class="row flex-lg-nowrap">
                <div class="col-12 mb-3">
                    <div class="e-panel card">
                        <div class="card-header">
                            <h3 class="card-title">Blog List</h3>
                            @can('blog-create')
                                <a href="{{ route('show-blog-add') }}" class="btn btn-primary float-right ml-auto">
                                    <i class="fe fe-plus mr-2"></i> Add Blog
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">

                            <div class="e-table">
                                <div class="table-responsive table-lg mt-3">
                                    <div id="sender_search" class="dataTables_filter">
                                        <label class="float-right ml-3">
                                            <button class="btn btn-danger form-control-sm" wire:click="resetFilters">
                                                <i class="fa fa-close" style="line-height: 20px"></i>
                                            </button>
                                        </label>
                                        <label class="float-right">
                                            <input class="form-control form-control-sm" placeholder="Search..."
                                                wire:model='search'>
                                        </label>
                                    </div>
                                    <div id="sender_pag" class="dataTables_filter float-left text-center"
                                        style="max-width: 40px; display: inline-block">
                                        <select wire:model='perPage' aria-controls="example1"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    <div id="sender_city" class="dataTables_filter float-left text-center ml-3"
                                        style="width: 150px; display: inline-block">
                                        <select wire:model='selected_category' aria-controls="example1"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="0"> Filter by category </option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <table
                                        class="table table-bordered mp-0 table-striped table-vcenter border-top text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">Blog Title</th>
                                                <th class="wd-15p border-bottom-0">Categorie</th>
                                                <th class="wd-15p border-bottom-0">Blogger</th>
                                                <th class="wd-15p border-bottom-0">Status</th>
                                                <th class="wd-15p border-bottom-0">Date Creation</th>
                                                <th class="wd-15p border-bottom-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="change-user">
                                            @foreach ($blogs as $blog)
                                                <tr>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>
                                                        @if (!empty($blog->categories()))
                                                            @foreach ($blog->categories()->get() as $categ)
                                                                <label
                                                                    class="badge badge-success">{{ $categ->title }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>{{ $blog->user->firstname }} {{ $blog->user->lastname }}</td>
                                                    {{-- <td>{{ visits($blog)->count() }}</td> --}}
                                                    <td>
                                                        @if ($blog->status == 0)
                                                            <button class="btn-sm btn-danger mt-2"
                                                                wire:click="enable({{ $blog->id }})">Désactivé</button>
                                                        @else
                                                            <button class="btn-sm btn-success mt-2"
                                                                wire:click="disable({{ $blog->id }})">Activé</button>
                                                        @endif
                                                    </td>
                                                    <td>{{ $blog->created_at }}</td>
                                                    <td>

                                                        @can('blog-edit')
                                                            <a href="{{ route('show-blog-update', [$blog->id]) }}"
                                                                class="btn btn-primary">
                                                                <i class="fe fe-edit"></i>
                                                            </a>
                                                        @endcan
                                                        <a href="/conseils/{{ $blog->slug }}" target="_blank"
                                                            class="btn btn-success {{ $blog->ismodified && $blog->status == 0 ? 'flash' : '' }}">
                                                            <i class="fe fe-eye"></i>
                                                        </a>
                                                        @can('blog-delete')
                                                            <button type="button" class="btn btn-danger"
                                                                wire:click="delete({{ $blog->id }})">
                                                                <i class="fe fe-trash"></i>
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
