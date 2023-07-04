<!-- START SECTION PROPERTIES FOR SALE -->
<section class="featured portfolio bg-white-2 rec-pro">
    <div class="container-fluid">
        <div class="portfolio col-xl-12">
            <div class="slick-villes">
                @foreach ($villes as $ville)
                    <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                        <a href="/ville/{{ $ville->title }}"
                            class="btn btn-primary ville-tags btn-block">{{ $ville->title }}</a>
                    </div>
                @endforeach
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 2</div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 3</div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 4</div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 5</div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 6</div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 7</div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 8</div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="btn btn-primary ville-tags btn-block">Ville 9</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION PROPERTIES FOR SALE -->
