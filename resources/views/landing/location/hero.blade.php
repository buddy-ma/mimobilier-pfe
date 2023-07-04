<!-- STAR HEADER SEARCH -->
<section id="home" class="parallax-searchs section welcome-area overlay">
    <div class="hero-main">
        <div class="container">
            <form action="{{ route('location') }}" method="GET">
                <input type="hidden" name="category_id" id="category_id" value="2" style="display: none">

                <div class="row">
                    <div class="col-12" style="max-width: 700px">
                        <div class="banner-search-wrap" data-aos="zoom-in">
                            <ul class="nav nav-tabs rld-banner-tab">
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#tabs_1">Achat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs_2">Location</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs_3">Vacances</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs_4">ImmoNeuf</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <div class="rld-main-search">
                                        <div class="row px-3 mb-2">
                                            <div class="col-6 mb-4">
                                                <div class="rld-single-input">
                                                    <div class="rld-single-select">
                                                        <select name="ville" class="select single-select mr-0">
                                                            <option value="">Villes</option>
                                                            @foreach ($villes as $vll)
                                                                <option value="{{ $vll }}"
                                                                    @if ($vll == $ville) selected @endif>
                                                                    {{ $vll }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-4">
                                                <div class="rld-single-input">
                                                    <div class="rld-single-select">
                                                        <select name="quartier" class="select single-select mr-0">
                                                            <option value="">Quartiers</option>
                                                            @foreach ($quartiers as $qrt)
                                                                <option value="{{ $qrt }}"
                                                                    @if ($quartier == $qrt) selected @endif>
                                                                    {{ $qrt }}
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="rld-single-select">
                                                    <select name="type_id" class="select single-select mr-0">
                                                        <option value="">Type</option>
                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id }}"
                                                                @if ($type_id == $type->id) selected @endif>
                                                                {{ $type->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="rld-single-input">
                                                    <input name="nbr_pieces" value="{{ $nbr_pieces }}" type="number"
                                                        placeholder="Nbr. pieces" max="{{ $nbr_pieces }}"
                                                        value="{{ $nbr_pieces }}">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-4">
                                                <div class="rld-single-input">
                                                    <input name="surface_min" value="{{ $surface_min }}"
                                                        type="number" placeholder="Surface Min">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-4">
                                                <div class="rld-single-input">
                                                    <input name="prix_max" value="{{ $prix_max }}" type="number"
                                                        placeholder="Prix Max">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="rld-single-input">
                                                    <input name="reference" value="{{ $reference }}" type="text"
                                                        placeholder="Réference...">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-yellow w-100">Recherchez</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Search Form -->
                </div>
            </form>
        </div>
    </div>
</section>
