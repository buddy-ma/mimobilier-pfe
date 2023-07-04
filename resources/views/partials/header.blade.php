<header id="header-container" class="header head-tr ">
    <!-- Header -->
    <div id="header" class="head-tr bottom">
        <div class="container container-header">
            <div id="logo">
                <a href="/">
                    <img src="{{ asset('assets/images/logo-' . app()->view->getSections()['logo'] . '.svg') }}"
                        alt="logo">
                </a>
            </div>
            <!-- Mobile Navigation -->
            <div class="mmenu-trigger">
                <button class="hamburger hamburger--collapse" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
            <!-- Main Navigation -->
            <nav id="navigation" class="style-1 head-tr">
                <ul id="responsive">
                    <li><a href="/">Acceuil</a></li>
                    <li><a href="/achat">Achat</a></li>
                    <li><a href="/location">Location</a></li>
                    <li><a href="/vacances">Vacances</a></li>
                    <li><a href="/immoneuf">Immo neuf</a></li>
                    <li><a href="/conseils">Conseils Immobilier</a></li>
                    <li><a href="/decouvrezMaroc">Decouvrez le maroc</a></li>
                    <li><a href="/commercialiser">Commercialiser Votre bien</a></li>
                    <li><a href="/">Nos Services</a></li>
                </ul>
            </nav>
        </div>
    </div>

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
