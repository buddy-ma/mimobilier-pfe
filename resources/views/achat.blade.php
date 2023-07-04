@extends('layouts.app')@section('meta')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="robots" content="index,follow" />
<meta name="description"
    content="Achat immobilier neuf au Maroc : publier une annonce ou rechercher des villas, appartements, maisons, terrains, studios ou bureaux à vendre entre particuliers.">
<meta name="author" content="">@endsection
@section('title', 'Achat immobilier : appartement, maison, villa et terrain')
@section('logo', 'blue')
@section('bodyClasses', 'homepage-3 the-search')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/colors/blue.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/colors/last-edit/achat-style.css') }}">

<style>
    .ville h4 {
        position: relative;
        top: 110px;
        background: rgb(52 52 52 / 50%);
        line-height: 60px !important;
    }

    .ville:hover h4 {
        background: none !important;
    }
</style>
@endsection
@section('content')

@include('landing.hero', [
    'active' => 'achat',
    'title' => 'Achetez malin, évitez les frais d\'agence grâce à l\'achat de biens immobiliers neufs',
    'text' =>
        'Profitez de la liberté de recherche, de négociation transparente et réalisez des économies significatives, avec nous et économisez sur votre achat immobilier en évitant les frais d\'agence grâce à l\'achat entre particuliers et à l\'achat de biens immobiliers neufs.',
])

@include('landing.achat.catalogueProduits')
<section class="featured portfolio bg-white rec-pro">
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-md-6 col-12">
                <h2 style="text-transform: none">Découvrez notre sélection d'immobilier neuf et de particulier à
                    particulier</h2>
                <p>L'achat de biens immobiliers neufs au Maroc peut être un projet excitant, mais il peut également être
                    difficile de trouver la propriété parfaite qui répond à vos besoins et à votre budget.
                    Heureusement, grâce aux annonces de biens à vendre directement publiées par des particuliers, vous
                    pouvez gagner du temps.
                    Que vous cherchiez une villa spacieuse, un appartement moderne, une maison traditionnelle, un
                    terrain pour construire votre propre maison, un studio confortable ou un espace professionnel pour
                    votre entreprise, nous sommes sûrs que vous trouverez la propriété de vos rêves.
                </p>
            </div>
            <div class="col-md-6 col-12">
                <img style="max-height: fit-content;" src="{{ asset('assets/images/post-7-01.jpg') }}"
                    alt="Annonce immobilière particulier à particulier">
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection
