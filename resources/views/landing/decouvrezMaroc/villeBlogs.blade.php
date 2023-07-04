<div class="container">
    <div class="row">
        @foreach ($blogs->chunk(5) as $chunk)
            <div class="col-md-4 col-12">
                <div class="property wprt-image-video w50 pro vid-si2">
                    <ul>
                        @foreach ($chunk as $blog)
                            <li>
                                <a href="/quartier/{{ $blog->slug }}">{{ $blog->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
