<!-- START SECTION PROPERTIES FOR SALE -->
<section class="featured portfolio rec-pro">
    <div class="container-fluid">
        <div class="portfolio col-xl-12">
            <div class="slick-villes">
                @foreach ($tags as $tag)
                    <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                        <button class="btn btn-primary tags btn-block">{{ $tag }}</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- END SECTION PROPERTIES FOR SALE -->
