<div>
    @if ($addCategory)
        @include('livewire.admin.category.add')
    @elseif($editCategory)
        @include('livewire.admin.category.edit')
    @else
        <div class="row flex-lg-nowrap">
            <div class="col-12 mb-3">
                <div class="e-panel card">
                    <div class="card-header">
                        <h3 class="card-title">Categories List</h3>
                        @can('category-create')
                            <a wire:click="addCategory" class="float-right ml-auto">
                                <button type="button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add
                                    Categorie</button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="e-table">
                            <div class="table-responsive table-lg mt-3">
                                <table class="table card-table table-vcenter text-nowrap border p-0">
                                    <thead>
                                        <tr>
                                            <th>Categorie</th>
                                            <th>Date Creation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($categories)
                                            @foreach ($categories as $categorie)
                                                <tr class="table-subheader">
                                                    <td>{{ $categorie->title }}</td>
                                                    <td>{{ $categorie->created_at }}</td>
                                                    <td>
                                                        @can('category-edit')
                                                            <a wire:click="editCategory({{ $categorie->id }})"
                                                                class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                        @endcan
                                                        @can('category-delete')
                                                            <button wire:click="delete({{ $categorie->id }})" type="button"
                                                                class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
