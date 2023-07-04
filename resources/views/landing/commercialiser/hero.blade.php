<section class="header-image parallax-search8 th-8 d-flex align-items-center" id="slider">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-12 col-sm-12" data-aos="fade-left">
                <div class="trip-search contact-us">
                    <div class="row">
                        <div class="col-md-6 col-12 d-xs-none">
                            <h2 class="text-center mb-4">Contacter nous</h2>
                            <ul class="pl-md-5 mt-3 ">
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="text-icon d-inline ml-2">
                                            {{ $page->address ?? '95 South Park Ave, USA' }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="text-icon d-inline ml-2"> {{ $page->phone ?? '+456 875 369 208' }}
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="text-icon d-inline ml-2 ti">
                                            {{ $page->email ?? 'support@findhouses.com' }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-12">
                           
                            <form class="contact-form" method="POST" action="{{ route('commercialiserContact') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required class="form-control input-custom input-full"
                                        name="fullname" placeholder="Nom complet" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control input-custom input-full"
                                        name="phone" placeholder="Telephone" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-custom input-full" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control textarea-custom input-full" name="message" required rows="5"
                                        placeholder="Message..."></textarea>
                                </div>
                                <div class="form-group button">
                                    <button type="submit" class="btn">Envoyer</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 d-md-none">
                            <ul class="pl-md-5 mt-3 row text-left">
                                <li class="col-12">
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="text-icon d-inline ml-2">
                                            {{ $page->address ?? '95 South Park Ave, USA' }}</p>
                                    </div>
                                </li>
                                <li class="col-12">
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="text-icon d-inline ml-2"> {{ $page->phone ?? '+456 875 369 208' }}
                                        </p>
                                    </div>
                                </li>
                                <li class="col-12 mb-4">
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="text-icon d-inline ml-2 ti">
                                            {{ $page->email ?? 'support@findhouses.com' }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
