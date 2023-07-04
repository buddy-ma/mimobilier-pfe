<!-- STAR HEADER SEARCH -->
<section id="home" class="parallax-searchs section welcome-area overlay">
    <div class="hero-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-white">Conseils Immobilier</h1>
                    <div class="banner-search-wrap" data-aos="zoom-in">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="rld-main-search" style="max-height: 120px">
                                    <form action="{{ route('conseils') }}" method="GET">
                                        @csrf
                                        <div class="row px-3 mb-2">
                                            <div class="col-9 mb-4">
                                                <div class="rld-single-input">
                                                    <input name='search' type="text" value="{{ $term ?? '' }}"
                                                        placeholder="Recherchez">
                                                </div>
                                            </div>
                                            <div class="col-3 px-xs-1">
                                                <button class="btn btn-yellow w-100 d-xs-none"
                                                    type="submit">Recherchez</button>
                                                <button class="btn btn-yellow w-100 d-md-none" type="submit"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Search Form -->
            </div>
        </div>
    </div>
</section>
<!-- END HEADER SEARCH -->
