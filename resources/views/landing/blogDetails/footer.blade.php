<!-- START FOOTER -->
<footer class="first-footer ">
    <div class="top-footer bg-blue w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Achat</h3>
                        <div class="nav-footer">
                            <ul>
                                @foreach ($achat as $ach)
                                    <li><a href="/produit/{{ $ach->slug }}">{{ $ach->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Location</h3>
                        <div class="nav-footer">
                            <ul>
                                @foreach ($location as $loc)
                                    <li><a href="/produit/{{ $loc->slug }}">{{ $loc->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>ImmoNeuf</h3>
                        <div class="nav-footer">
                            <ul>
                                @foreach ($immoneuf as $immo)
                                    <li><a href="/produit/{{ $immo->slug }}">{{ $immo->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Vacances</h3>
                        <div class="nav-footer">
                            <ul>
                                @foreach ($vacances as $vc)
                                    <li><a href="/produit/{{ $vc->slug }}">{{ $vc->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
