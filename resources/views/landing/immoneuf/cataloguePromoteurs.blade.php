<!-- START SECTION PROPERTIES FOR SALE -->
<section class="featured portfolio bg-white-2 rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><span>Catalogue des </span>promoteurs.</h2>
        </div>
        <div class="portfolio row">
            @foreach ($promoteurs as $prm)
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/product/logo/' . $prm->logo) }}"
                            alt="promoteur {{ $prm->firstname }} {{ $prm->lastname }}"
                            class="mb-3 w-50 ml-auto mr-auto d-block">
                        <h3>{{ $prm->firstname }} {{ $prm->lastname }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
