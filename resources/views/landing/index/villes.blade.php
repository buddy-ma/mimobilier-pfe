<section class="popular-places bg-white">
    <div class="container">
        <div class="sec-title">
            <h2><span>Nos </span>Villes</h2>
        </div>
        <div class="row">
            @foreach ($villes as $ville)
                <div class="col-sm-6 col-lg-3 col-xl-3 ville" data-aos="zoom-in" data-aos-delay="150">
                    <a href="/ville/{{ $ville->title }}" class="img-box hover-effect">
                        <img src="{{ asset('images/villes/' . $ville->image) }}" class="img-responsive"
                            alt="{{ $ville->title }}">
                        {{-- <div class="listing-badges">
                            <span class="featured">Featured</span>
                        </div> --}}
                        <div class="img-box-content visible">
                            <h4>{{ $ville->title }} </h4>
                            {{-- <span>203 Properties</span> --}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END SECTION POPULAR PLACES -->
