<section class="blog-section bg-blue w-100">
    <div class="container">
        <div class="sec-title text-white text-center mb-5">
            <h2 class="text-white"><span class="text-white">Articles </span>Similaires</h2>
        </div>
        <div class="news-wrap">
            <div class="row">
                @foreach ($similaires as $art)
                    <div onclick="window.location.href='/conseils/{{ $art->slug }}'"
                        class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item" data-aos="fade-up" data-aos-delay="200">
                            <a href="/conseils/{{ $art->slug }}" class="news-img-link">
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
                                <div class="dates">
                                    <span class="date">
                                        {{ $art->updated_at->translatedFormat('F j, Y') }}
                                    </span>
                                    {{-- <ul class="action-list pl-0">
                                        <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span></li>
                                        <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                        <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                    </ul> --}}
                                </div>
                                <a href="/conseils/{{ $art->slug }}">
                                    <h3>{{ $art->title }} - {{ $art->id }}</h3>
                                </a>

                                <div class="news-item-descr big-news">
                                    @php
                                        $txt = strip_tags($art->text);
                                        $txt = html_entity_decode($txt);
                                    @endphp
                                    <p>{{ substr($txt, 0, 170) }}... </p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="/conseils/{{ $art->slug }}" class="news-link">Read more...</a>
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
