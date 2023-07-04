@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="Pour découvrir les merveilles du Maroc, consultez notre guide de voyage qui vous fournira toutes les informations essentielles pour planifier votre voyage.">
    <meta name="author" content="">
@endsection
@section('title', 'Découvrir et explorer le Maroc - guide de voyage')
@section('logo', 'orange')
@section('bodyClasses', 'decouvrez homepage-3 the-search')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/colors/orange.css') }}">

    <style>
        .ville-tags {
            background: #ddd !important;
            color: #000;
            font-weight: bold;
            border: none;
            border-radius: 30px;
        }

        .tags {
            background: #555 !important;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 30px;
        }
    </style>
@endsection
@section('content')

    @include('landing.decouvrezMaroc.hero')
	
	  <section class="featured portfolio bg-white rec-pro">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 style="text-transform: none">Explorez les villes marocaines</h2>
                    <h3 style="text-transform: none">Une culture à découvrir !</h3>
					<p>Explorez les merveilles des villes marocaines ! Découvrez la gastronomie délicieuse, la culture vibrante, les marchés animés et les monuments touristiques emblématiques. Notre guide vous propose des articles détaillés sur les quartiers dynamiques, les attractions incontournables et les activités à ne pas manquer. Plongez dans l'histoire riche de chaque ville et savourez les spécialités régionales. Le Maroc est un pays fascinant, riche en histoire, en culture et en paysages époustouflants. Des majestueuses montagnes de l'Atlas aux étendues désertiques du Sahara, en passant par les magnifiques côtes de l'océan Atlantique, le pays offre une diversité de paysages à couper le souffle. Les villes marocaines, avec leur architecture unique, leurs souks animés, leurs délicieuses spécialités culinaires et leur hospitalité chaleureuse, ne manqueront pas de vous séduire. Que vous soyez amateur d'aventure, de culture ou de détente, le Maroc a tout ce qu'il faut pour vous offrir des expériences inoubliables.</p>
                </div>
                <div class="col-md-6 col-12">
                    <img style="max-height: fit-content;"
                        src="{{ asset('assets/images/post-4-01.jpg') }}"
                        alt="Annonce immobilière particulier à particulier">
                </div>
            </div>
        </div>
    </section>

    @include('landing.index.catalogueConseilsMaroc')

    @include('landing.decouvrezMaroc.catalogueConseilsMaroc')


@endsection
@section('js')
    <script>
        function tags($t) {
            $('#search').val($t);
            $('#decouvrezMaroc').submit();
        }
    </script>
@endsection
