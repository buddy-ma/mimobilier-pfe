<section class="similar-property featured portfolio p-0 bg-white-inner">
    <div class="container">
        <h5>Anonnces similaires</h5>
        <div class="row portfolio-items">
            @foreach ($products as $product)
                <div onclick="window.location.href='/produit/{{ $product->id }}'"
                    class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                    <div class="project-single">
                        <div class="project-inner project-head">
                            <div class="homes">
                                <a href="/produit/{{ $product->id }}" class="homes-img">
                                    <div class="homes-tag button alt featured {{ strtolower($product->type->Titre) }}">
                                        {{ $product->type->Titre }}</div>
                                    @if ($product->first_image() !== null)
                                        <img src="{{ URL::asset('storage/product/images/' . $product->first_image()->image) }}"
                                            alt="{{ $product->id }}" class="img-responsive">
                                    @else
                                        <img src="{{ URL::asset('admin_assets/images/products/1.jpg') }}"
                                            alt="{{ $product->id }}" class="img-responsive">
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
                                    <i class="fa fa-map-marker"></i><span>{{ $product->ville }},
                                        {{ $product->quartier }}, {{ $product->address }}</span>
                                </a>
                            </p>
                            <ul class="homes-list clearfix">
                                <li class="the-icons">
                                    <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                    <span>{{ $product->nbr_chambres }} chambres</span>
                                </li>

                                <li class="the-icons">
                                    <i class="flaticon-square" aria-hidden="true"></i>
                                    <span>{{ $product->surface }} {{ $product->unite_surface }}</span>
                                </li>
                            </ul>
                            <div class="price-properties footer pt-3 pb-0">
                                <h3 class="title mt-3">
                                    <a> {{ number_format($product->prix, 2) }} dh</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END SECTION PROPERTIES FOR SALE -->
