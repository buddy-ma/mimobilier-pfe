<section class="blog-section bg-white-2 w-100">
    <div class="container">
        <div class="sec-title text-white">
            <h2><span> Decouvrez </span> le Maroc.</h2>
        </div>
        <div class="portfolio col-xl-12">
            <div class="slick-blogs">
                @foreach ($citys as $city)
                    <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                        <div class="landscapes">
                            <div class="project-single">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <a href="/ville/{{ $city->title }}" class="news-img-link">
                                            <div class="news-item-img">
                                                @isset($city->image)
                                                    <img class="img-responsive"
                                                        src="{{ asset('images/villes/' . $city->image) }}"
                                                        alt="{{ $city->title }}">
                                                @else
                                                    <img class="img-responsive"
                                                        src="{{ asset('assets/images/blog/b-10.jpg') }}"
                                                        alt="{{ $city->title }}">
                                                @endisset
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="homes-content">
                                    <a href="/ville/{{ $city->title }}">
                                        <h3>{{ $city->title }}</h3>
                                    </a>

                                    <div class="news-item-descr big-news">
                                        @php
                                            $txt = strip_tags($city->text);
                                            $txt = html_entity_decode($txt);
                                        @endphp
                                        <p>{{ substr($txt, 0, 170) }}... </p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="/ville/{{ $city->title }}" class="news-link">Read more...</a>
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
<!-- END SECTION BLOG -->
