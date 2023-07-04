<div class="row">

    <div class="col-md-8 col-12">

        <div class="single homes-content details mb-30 mt-4">

            <h5 class="mb-4">Details</h5>

            <ul class="homes-list clearfix">
                <li>
                    <b><i class="fa fa-home" aria-hidden="true"></i> Type : </b>
                    <span>{{ $product->type->Titre }}</span>
                </li>

                <li>
                    <b><i class="fa fa-hashtag" aria-hidden="true"></i> Reference : </b>
                    <span>{{ $product->reference }}</span>
                </li>
                <li>
                    <b><i class="fa fa-money-bill" aria-hidden="true"></i> Prix : </b>
                    <span>{{ number_format($product->prix, 2) }} dh</span>
                </li>
            </ul>

            <ul class="homes-list clearfix">
                <li>
                    <b><i class="fa fa-map" aria-hidden="true"></i> Ville : </b>
                    <span>{{ $product->ville?->title }}</span>
                </li>

                <li>
                    <b><i class="fa fa-map" aria-hidden="true"></i> Quartier : </b>
                    <span>{{ $product->quartier?->title }}</span>
                </li>

                <li>
                    <b><i class="fa fa-map" aria-hidden="true"></i> Addresse : </b>
                    <span>{{ $product->Adresse }}</span>

                </li>

                <li>
                    <b><i class="fa fa-arrows-alt" aria-hidden="true"></i> Surface : </b>

                    <span>{{ $product->surface }} m²</span>

                </li>

                <li>
                    <b><i class="fa fa-bed" aria-hidden="true"></i> Nbr Chambres : </b>
                    <span>{{ $product->nbr_chambres }}</span>
                </li>

            </ul>

        </div>

    </div>

    <aside class="col-lg-4 col-md-12 col-12 car">

        <div class="single widget">

            <div class="sidebar">

                <div class="widget-boxed mt-3">

                    <div class="widget-boxed-body">

                        <div class="sidebar-widget author-widget2">

                            <div class="agent-contact-form-sidebar">
                                <h4>Information du promoteur
                                </h4>

                                <ul class="author__contact" id="app">

                                    <li>

                                        <span class="la la-user">

                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </span>{{ $product->promoteur->firstname }}

                                        {{ $product->promoteur->lastname }}

                                    </li>

                                    <li v-if="show">

                                        <span class="la la-phone">

                                            <i class="fa fa-phone" aria-hidden="true"></i>

                                        </span>{{ $product->promoteur->phone }}

                                    </li>

                                    <li v-else>

                                        <span class="la la-phone">

                                            <i class="fa fa-phone" aria-hidden="true"></i>

                                        </span>{{ substr($product->promoteur->phone, 0, 3) }}****

                                    </li>



                                    <button v-if="!show" @click="voir({{ $product->id }})" type="button"
                                        class="btn btn-block btn-primary mt-3">

                                        Voir telephone

                                    </button>

                                </ul>


                                <hr>

                                <h4>Demande de visite</h4>

                                @if ($errors->any())

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>

                                    </div>

                                @endif

                                <form method="post" action="{{ route('produitContact', $product->id) }}">

                                    @csrf

                                    <input type="text" name="fullname" placeholder="Nom complet" required />

                                    <input type="text" maxlength="10" name="phone" placeholder="Telephone"
                                        required />

                                    <input type="email" name="email" placeholder="Email Address" />

                                    <textarea placeholder="Message" name="message" required></textarea>

                                    <button type="submit" class="btn btn-block btn-primary mt-3"> Envoyer </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </aside>

</div>

@section('js')
    <script>
        const {

            createApp

        } = Vue

        createApp({

            data() {

                return {

                    id: 0,

                    show: false,

                };

            },

            methods: {

                voir(id) {

                    axios.get('/vues_phone', {

                            params: {

                                id: id,

                            }

                        })

                        .then(response => {

                            //show phone

                            this.show = true

                        })

                        .catch(error => {});

                },

            }

        }).mount('#app')
    </script>
@endsection
