<!-- START SECTION PROPERTIES FOR SALE -->
<section class="featured portfolio bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            {{-- <h2><span>Catalogue des </span>produits.</h2> --}}
            <h2>2P,<span> la quintessence de l'immobilier marocain. </span></h2>
        </div>
        <div class="portfolio row">
            @forelse ($products as $product)
                <div onclick="window.location.href='/produit/{{ $product->slug }}'"
                    class="agents-grid col-xl-3 col-md-4 col-12 mb-3">
                    <div class="landscapes">
                        <div class="project-single">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <a href="/produit/{{ $product->slug }}" class="homes-img">
                                        <div class="homes-tag button alt featured">{{ $product->category->title }}
                                        </div>
                                        @if ($product->first_image() !== null)
                                            <img src="{{ URL::asset('storage/product/images/' . $product->first_image()->image) }}"
                                                alt="{{ $product->slug }}" class="img-responsive">
                                        @else
                                            <img src="{{ URL::asset('admin_assets/images/products/1.jpg') }}"
                                                alt="{{ $product->slug }}" class="img-responsive">
                                        @endif

                                    </a>
                                </div>
                                <div class="button-effect">
                                    @if (!empty($product->vr_link))
                                        <a href="{{ $product->vr_link }}" class="btn"><i class="fa fa-link"></i></a>
                                    @endif

                                    @if (!empty($product->video_link))
                                        <a href="{{ $product->video_link }}" class="btn popup-video popup-youtube"><i
                                                class="fas fa-video"></i></a>
                                    @endif

                                    <a href="/produit/{{ $product->slug }}" class="img-poppu btn"><i
                                            class="fa fa-photo"></i></a>
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3><a href="/produit/{{ $product->slug }}">{{ $product->title }}</a></h3>
                                <p class="homes-address mb-3">
                                    <a href="/produit/{{ $product->slug }}">
                                        <i class="fa fa-map-marker"></i><span>{{ $product->ville }},
                                            {{ $product->quartier }}, {{ $product->address }}</span>
                                    </a>
                                </p>
                                <!-- homes List -->
                                <ul class="homes-list clearfix">
                                    <li class="the-icons">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>{{ $product->type->title }}</span>
                                    </li>
                                    @if ($product->type->title != 'Terrains')
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
                                    <h3 class="title mt-3 product-price">
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
