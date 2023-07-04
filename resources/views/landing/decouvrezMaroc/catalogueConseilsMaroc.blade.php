<section class="blog-section bg-white-2 w-100">
    <div class="container">
        <div class="sec-title">
            @isset($term)
                <h2><span> {{ count($articlesMaroc) }} Resultats de </span>( {{ $term }} )</h2>
            @else
                <h2><span> Catalogue des </span>articles sur le Maroc.</h2>
            @endisset
        </div>
        <div class="news-wrap">
            <div class="row">
                @foreach ($articlesMaroc as $art)
                    <div onclick="window.location.href='/decouvrezMaroc/{{ $art->slug }}'"
                        class="col-xl-4 col-md-6 col-xs-12 mb-3">
                        <div class="news-item" data-aos="fade-up" data-aos-delay="200">
                            <a href="/decouvrezMaroc/{{ $art->slug }}" class="news-img-link">
                                <div class="news-item-img">
                                    @isset($art->image)
                                        <img class="img-responsive" src="{{ asset('images/' . $art->image) }}"
                                            alt="{{ $art->slug }}">
                                    @else
                                        <img class="img-responsive" src="{{ asset('assets/images/blog/b-10.jpg') }}"
                                            alt="{{ $art->slug }}">
                                    @endisset
                                </div>
                            </a>
                            <div class="news-item-text">
                                {{-- <div class="dates">
                                    <span class="date">
                                        {{ $art->updated_at->translatedFormat('F j, Y') }}
                                    </span>
                                </div> --}}
                                <a href="/decouvrezMaroc/{{ $art->slug }}">
                                    <h3>{{ $art->title }}</h3>
                                </a>

                                <div class="news-item-descr big-news">
                                    @php
                                        $txt = strip_tags($art->text);
                                        $txt = html_entity_decode($txt);
                                    @endphp
                                    <p>{{ substr($txt, 0, 170) }}... </p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="/decouvrezMaroc/{{ $art->slug }}" class="news-link">Read more...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
