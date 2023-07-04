@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="Achat immobilier neuf au Maroc : publier une annonce ou rechercher des villas, appartements, maisons, terrains, studios ou bureaux à vendre entre particuliers.">
    <meta name="author" content="">
@endsection
@section('title', 'Particulier a particulier')
@section('logo', $color)
@section('bodyClasses', 'inner-pages hd-white')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/colors/' . $color . '.css') }}">
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }
    </style>
@endsection
@section('content')
    {{-- <section class="headings">
        <div class="text-heading text-center">
        </div>
    </section> --}}
    <section class="single-proper blog details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <section class="headings-2 pt-3 pb-3">
                        <div class="pro-wrapper">
                            <div class="detail-wrapper-body">
                                <div class="listing-title-bar">
                                    <h3>{{ $product->Titre }}</h3>
                                </div>
                            </div>
                            <div class="single detail-wrapper mr-2">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <h4>{{ number_format($product->prix, 2) }} dh</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    @include('landing.product.carousel')

                    @include('landing.product.description')


                    <div class="property-location map mt-4">
                        <h5>Localisation</h5>
                        <div class="divider-fade"></div>
                        <p>
                            <i class="fa fa-map-pin mr-3"></i>{{ $product->ville?->title }},
                            {{ $product->quartier?->title }},
                            {{ $product->adresse }}
                        </p>
                    </div>

                    @include('landing.product.similarProduits')

                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
    </script>

    <script>
        $('.slick-carousel').each(function() {
            var slider = $(this);
            $(this).slick({
                infinite: true,
                dots: false,
                arrows: false,
                centerMode: true,
                centerPadding: '0'
            });

            $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                slider.slick('slickPrev');
            });
            $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                slider.slick('slickNext');
            });
        });

        $(document).ready(function() {
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
    </script>

@endsection
