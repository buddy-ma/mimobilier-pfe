@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="Publier une annonce immobilière pour vente et location de particuliers à particulier d’appartement, villa, maison, terrain, studio, plateau bureau au Maroc.">
    <meta name="author" content="">
@endsection
@section('title', 'Publier une annonce immobilière - achat et vente')
@section('logo', 'blue')
@section('bodyClasses', 'th-8 homepage-4 hp-6 hd-white')
@section('css')
    <link rel="stylesheet" id="color" href="{{ asset('assets/css/colors/blue.css') }}">
    <style>
        .img-responsive {
            display: inline-block;
            max-width: 100%;
            width: 100%;
            max-height: 200px !important;
            height: auto;
        }

        p {
            text-align: left !important;
        }
    </style>
@endsection
@section('content')

    @include('landing.commercialiser.hero')
	    @isset($page)
	    <section class="featured portfolio bg-white rec-pro">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="text-transform: none">Déposez votre annonce immobilière</h2>
					<h3 style="text-transform: none">Économisez sur les frais d'agence, publiez une announce entre particuliers !</h3>
                    <p>Il est très facile de publier une annonce immobilière sur 2P.ma, que ce soit pour la vente, la location, l'échange ou la colocation. Vos annonces bénéficieront d'une visibilité exceptionnelle grâce à notre portail immobilier exclusivement dédié aux particuliers.
					</p>
                </div>
            </div>
        </div>
    </section>

        @include('landing.commercialiser.apropos')
    @else
        @include('static.apropos')
    @endisset

@endsection
@section('js')

@endsection
