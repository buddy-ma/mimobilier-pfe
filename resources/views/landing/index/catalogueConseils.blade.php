<section class="blog-section bg-blue w-100">
    <div class="container">
        <div class="sec-title text-white">
            <h2 class="text-white"><span class="text-white">Conseils </span>Immobilier</h2>
        </div>
        <div class="portfolio col-xl-12">
            <div class="slick-blogs">
                @foreach ($conseils as $cns)
                    <div onclick="window.location.href='/conseils/{{ $cns->slug }}'" class="agents-grid"
                        data-aos="fade-up" data-aos-delay="150">
                        <div class="landscapes">
                            <div class="project-single">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <a href="/conseils/{{ $cns->slug }}" class="news-img-link">
                                            <div class="news-item-img">
                                                @isset($cns->image)
                                                    <img class="img-responsive" src="{{ asset('images/' . $cns->image) }}"
                                                        alt="{{ $cns->slug }}">
                                                @else
                                                    <img class="img-responsive"
                                                        src="{{ asset('assets/images/blog/b-10.jpg') }}"
                                                        alt="{{ $cns->slug }}">
                                                @endisset
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="homes-content">
                                    <div class="dates">
                                        <span class="date">
                                            {{ $cns->updated_at->translatedFormat('F j, Y') }}
                                        </span>
                                    </div>
                                    <a href="/conseils/{{ $cns->slug }}">
                                        <h3>{{ $cns->title }}</h3>
                                    </a>

                                    <div class="news-item-descr big-news">
                                        @php
                                            $txt = strip_tags($cns->text);
                                            $txt = html_entity_decode($txt);
                                        @endphp
                                        <p>{{ substr($txt, 0, 170) }}... </p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="/conseils/{{ $cns->slug }}" class="news-link">Read more...</a>
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
