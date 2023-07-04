<section class="blog-section bg-blue w-100">
    <div class="container">
        <div class="sec-title text-white">
            <h2 class="text-white"><span class="text-white">Catalogue des </span>Conseils</h2>
        </div>
        <div class="news-wrap">
            <div class="row">
                @foreach ($conseils as $cns)
                    <div class="col-xl-4 col-md-6 col-xs-12">
                        <div class="news-item" data-aos="fade-up" data-aos-delay="200">
                            <a href="/blog/{{ $cns->slug }}" class="news-img-link">
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
                                    {{-- <ul class="action-list pl-0">
                                        <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span></li>
                                        <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                        <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                    </ul> --}}
                                </div>
                                <a href="/blog/{{ $cns->slug }}">
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
                                    <a href="/blog/{{ $cns->slug }}" class="news-link">Read more...</a>
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
