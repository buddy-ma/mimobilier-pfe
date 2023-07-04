<section class="featured portfolio bg-white-2 rec-pro">
    <div class="container-fluid">
        <div class="portfolio col-xl-12">
            <div class="slick-villes">
                @foreach ($villes as $ville)
                    <div class="agents-grid" onclick="villeTag('{{ $ville }}')" data-aos="fade-up"
                        data-aos-delay="150">
                        <a class="btn btn-primary ville-tags btn-block">
                            {{ $ville }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
