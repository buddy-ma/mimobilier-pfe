<div>
    @if ($voir)
        <div class="card">
            <div class="card-body">
                <div class="email-media">
                    <div class="mt-0 d-sm-flex">
                        <img class="mr-2 rounded-circle avatar avatar-lg"
                            src="{{ asset('admin_assets/images/users/avatar.png') }}" alt="avatar">
                        <div class="media-body pt-0">
                            <div class="float-right d-none d-md-flex fs-15">
                                <a wire:click="repondre({{ $contact->id }})" class="btn btn-primary">
                                    <i class="fa fa-check mr-2"></i> Repondre
                                </a>
                                <a wire:click="closeVoir()" class="btn btn-danger ml-2">
                                    <i class="fa fa-close"></i>
                                </a>
                            </div>
                            <div class="media-title text-dark font-weight-semibold mt-1">{{ $contact->fullname }} <span
                                    class="text-muted font-weight-semibold">( {{ $contact->email }} )</span></div>
                            <small class="mb-0">{{ $contact->phone }}</small>
                        </div>
                    </div>
                </div>
                <div class="eamil-body mt-5">
                    <h6>Produit : {{ $contact->product->title }}</h6>
                    <p>
                        {{ $contact->message }}
                    </p>
                </div>
            </div>
            <div class="card-footer">
                {{ $contact->updated_at->translatedFormat('F j, Y, h:m') }}
            </div>
        </div>
    @endif
    <div class="row flex-lg-nowrap">
        <div class="col-12 mb-3">
            <div class="e-panel card">
                <div class="card-header">
                    <h3 class="card-title">Demandes de visites</h3>
                </div>
                <div class="card-body">
                    <div class="e-table">
                        <div class="table-responsive table-lg mt-3">
                            <table class="table card-table table-vcenter text-nowrap border p-0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Repondu</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($contacts)
                                        @foreach ($contacts as $contact)
                                            <tr class="table-subheader">
                                                <td>{{ $contact->fullname }}</td>
                                                <td>{{ $contact->email ?? '' }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ substr($contact->message, 0, 60) }}...</td>
                                                <td>
                                                    @if ($contact->answered == 0)
                                                        <span class="badge badge-default mt-2">Non</span>
                                                    @else
                                                        <span class="badge badge-success mt-2">Oui</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a wire:click="voir({{ $contact->id }})" class="btn btn-success"><i
                                                            class="fa fa-eye mr-2"></i>Voir</a>
                                                    @if ($contact->answered == 0)
                                                        <a wire:click="repondre({{ $contact->id }})"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-check mr-2"></i> Repondre
                                                        </a>
                                                    @endif
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
</div>
