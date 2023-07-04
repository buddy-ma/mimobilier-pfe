    <!-- START SECTION PROPERTIES FOR SALE -->
    <section class="featured portfolio bg-white-2 rec-pro">
        <div class="container-fluid">
            <div class="sec-Titre">
                {{-- <h2><span>Catalogue des </span>produits.</h2> --}}
                <h2>2P,<span> la quintessence de l'immobilier marocain. </span></h2>
            </div>

            {{-- @include('landing.tags') --}}

            <div class="portfolio row">

                @forelse ($products as $product)
                    <div onclick="window.location.href='/produit/{{ $product->id }}'"
                        class="agents-grid col-xl-3 col-md-4 col-12 mb-3">
                        <div class="landscapes">
                            <div class="project-single">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <a href="/produit/{{ $product->id }}" class="homes-img">
                                            <div class="homes-tag button alt featured">{{ $product->type->Titre }}
                                            </div>
                                            @php $firstImage = $product->getFirstImage(); @endphp
                                            @if ($firstImage)
                                                <img src="{{ asset($firstImage->image) }}" class="card-image1"
                                                    alt="annonce">
                                            @else
                                                <img src="{{ URL::asset('admin_assets/images/products/1.jpg') }}"
                                                    alt="{{ $product->id }}" class="img-responsive">
                                            @endif

                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        @if (!empty($product->vr_link))
                                            <a href="{{ $product->vr_link }}" class="btn"><i
                                                    class="fa fa-link"></i></a>
                                        @endif

                                        @if (!empty($product->video_link))
                                            <a href="{{ $product->video_link }}"
                                                class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                        @endif

                                        <a href="/produit/{{ $product->id }}" class="img-poppu btn"><i
                                                class="fa fa-photo"></i></a>
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="homes-content">
                                    <!-- homes Adresse -->
                                    <h3><a href="/produit/{{ $product->id }}">{{ $product->Titre }}</a></h3>
                                    <p class="homes-Adresse mb-3">
                                        <a href="/produit/{{ $product->id }}">
                                            <i class="fa fa-map-marker"></i><span>{{ $product->ville?->title }},
                                                {{ $product->quartier?->title }}, {{ $product->Adresse }}</span>
                                        </a>
                                    </p>
                                    <!-- homes List -->
                                    <ul class="homes-list clearfix">
                                        <li class="the-icons">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>{{ $product->type->Titre }}</span>
                                        </li>
                                        @if ($product->type->Titre != 'Terrains')
                                            <li class="the-icons">
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                <span>{{ $product->nbr_chambres }} chambres</span>
                                            </li>
                                        @endif

                                        <li class="the-icons">
                                            <i class="fa fa-arrows" aria-hidden="true"></i>
                                            <span>{{ $product->surface }} {{ $product->unite_surface }}</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="fa fa-hashtag" aria-hidden="true"></i>
                                            <span>Référence {{ $product->reference }}</span>
                                        </li>
                                    </ul>
                                    <div class="price-properties footer pt-3 pb-0">
                                        <h3 class="Titre mt-3 product-price">
                                            <a> {{ number_format($product->prix, 2) }} dh</a>
                                        </h3>
                                        <!--<p class="reference">Référence:<span>{{ $product->reference }}</span></p>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <p class="text-center d-block"> Aucun Resultat. </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
