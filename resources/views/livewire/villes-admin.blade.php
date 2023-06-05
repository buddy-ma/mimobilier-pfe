<div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form encville="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Product </h3>
                    </div>
                    <div class="card-body pb-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="e-panel">
                                    <div class="expanel expanel-default">
                                        <div class="expanel-heading">
                                            <h3 class="expanel-title text-center">Villes</h3>
                                        </div>
                                        <div class="expanel-body">
                                            <ul class="list-group mb-0">
                                                @foreach ($villes as $ville)
                                                    <li class="list-group-item d-flex border-top-0 border-left-0 border-right-0 pt-5 "
                                                        tabindex="0">
                                                        @if ($ville->id == $selected_ville)
                                                            <div wire:click="selectVille({{ $ville->id }})"
                                                                style="cursor: pointer"
                                                                class="w-3 h-3 bg-success mr-3 mt-1 brround">
                                                            </div>
                                                        @else
                                                            <div wire:click="selectVille({{ $ville->id }})"
                                                                style="cursor: pointer"
                                                                class="w-3 h-3 bg-gray mr-3 mt-1 brround">
                                                            </div>
                                                        @endif
                                                        <h5 class="d-inline" style="cursor: pointer"
                                                            wire:click="selectVille({{ $ville->id }})">
                                                            {{ $ville->title }}</h5>
                                                        <p class="mb-0 text-muted fs-12 ml-auto float-right">
                                                            <strong>
                                                                <a wire:click="edit({{ $ville->id }})"
                                                                    style="cursor: pointer"> Edit
                                                                </a>
                                                                |
                                                                <a wire:click="delete({{ $ville->id }})"
                                                                    style="cursor: pointer">
                                                                    Delete
                                                                </a>
                                                            </strong>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="expanel-footer">
                                            <button class="btn btn-block btn-primary" type="button"
                                                wire:click="add">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="e-panel">
                                    <div class="expanel expanel-default">
                                        <div class="expanel-heading">
                                            <h3 class="expanel-title text-center">Quartiers</h3>
                                        </div>
                                        <div class="expanel-body">
                                            <ul class="list-group mb-0">
                                                @foreach ($quartiers as $quartier)
                                                    <li class="list-group-item d-flex border-top-0 border-left-0 border-right-0 pt-5"
                                                        tabindex="0">

                                                        <h5 class="d-inline">{{ $quartier->title }}</h5>
                                                        <p class="mb-0 text-muted fs-12 ml-auto float-right">
                                                            <strong>
                                                                <a wire:click="editQuartier({{ $quartier->id }})"
                                                                    style="cursor: pointer"> Edit
                                                                </a>
                                                                |
                                                                <a wire:click="deleteQuartier({{ $quartier->id }})"
                                                                    style="cursor: pointer">
                                                                    Delete
                                                                </a>
                                                            </strong>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="expanel-footer">
                                            @if (!empty($selected_ville))
                                                <button class="btn btn-block btn-primary" type="button"
                                                    wire:click="addQuartier">Add</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
