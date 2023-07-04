<!-- START SECTION PROPERTIES FOR SALE -->
<section class="featured portfolio bg-white-2 rec-pro">
    <div class="container-fluid">
        <div class="portfolio col-xl-12">
            <div class="slick-lancers2">
                @foreach ($products as $product)
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
                                                <img src="{{ asset($firstImage->image) }}" class="img-responsive"
                                                    alt="annonce">
                                            @else
                                                <img src="{{ URL::asset('admin_assets/images/products/1.jpg') }}"
                                                    alt="{{ $product->id }}" class="img-responsive">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="/produit/{{ $product->id }}" class="img-poppu btn"><i
                                                class="fa fa-photo"></i></a>
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="homes-content">
                                    <!-- homes address -->
                                    <h3><a href="/produit/{{ $product->id }}">{{ $product->Titre }}</a></h3>
                                    <p class="homes-address mb-3">
                                        <a href="/produit/{{ $product->id }}">
                                            <i class="fa fa-map-marker"></i><span>{{ $product->ville?->title }},
                                                {{ $product->quartier?->title }}, {{ $product->address }}</span>
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
                                            <span>{{ $product->surface }} m²</span>
                                        </li>
                                    </ul>
                                    <div class="price-properties footer pt-3 pb-0">
                                        <h3 class="title mt-3 product-price">
                                            <a> {{ number_format($product->prix, 2) }} dh</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- END SECTION PROPERTIES FOR SALE -->
