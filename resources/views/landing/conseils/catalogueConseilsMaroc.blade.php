<section class="blog-section bg-white-2 w-100">
    <div class="container">
        {{-- <div class="sec-title">
            @isset($term)
                <h2><span> {{ count($conseils) }} Resultats de </span>( {{ $term }} )</h2>
            @else
                <h2><span> Catalogue des </span>conseils immobilier.</h2>
            @endisset
        </div> --}}
        <div class="news-wrap">
            <div class="row">


                @foreach ($conseils as $cns)
                    <div onclick="window.location.href='/conseils/{{ $cns->slug }}'"
                        class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item" data-aos="fade-up" data-aos-delay="200">
                            <a href="/conseils/{{ $cns->slug }}" class="news-img-link">
                                <div class="news-item-img">
                                    @isset($cns->image)
                                        <img class="img-responsive" src="{{ asset('images/' . $cns->image) }}"
                                            alt="{{ $cns->slug }}">
                                    @else
                                        <img class="img-responsive" src="{{ asset('assets/images/blog/b-10.jpg') }}"
                                            alt="{{ $cns->slug }}">
                                    @endisset
                                </div>
                            </a>
                            <div class="news-item-text">
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
                @endforeach

            </div>
        </div>
    </div>
</section>
