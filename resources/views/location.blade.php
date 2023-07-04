@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="Annonces de location immobilières de particulier à particulier pour louer une villa, appartement, maison, terrain, plateau bureau, studio, et local commercial.">
    <meta name="author" content="">
@endsection
@section('title', 'Location villa, appartement, maison, terrain')
@section('logo', 'purple')
@section('bodyClasses', 'homepage-3 the-search')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/colors/purple.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/last-edit/location-style.css') }}">

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
        'active' => 'location',
        'title' => 'Location immobilière entre particuliers sans intermédiaires',
        'text' =>
            'La société "Particulier à Particulier" est spécialisée dans la commercialisation et le marketing immobilier. Elle propose son site web 2p.ma comme une plateforme d\'annonces de locations immobilières.',
    ])
    @include('landing.location.catalogueProduits')
    <section class="featured portfolio bg-white rec-pro">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 style="text-transform: none">Location immobilière : maison, villa, terrain, appartement…</h2>
                    <p> Trouvez votre logement idéal grâce à PARTICULIER A PARTICULIER, le leader de la vente et de la location de biens immobiliers au Maroc. Notre plateforme en ligne, 2p.ma, est spécialement conçue pour faciliter la recherche de locations immobilières, que ce soit des villas, des appartements, des studios, des maisons, des terrains, des fermes, des Riad ou même des locaux commerciaux tels que des boutiques, des bureaux, des entrepôts et des showrooms.
En optant pour notre plateforme de particulier à particulier, vous pouvez entrer directement en contact avec les propriétaires, évitant ainsi les frais d'agence et les commissions. Notre vaste sélection de biens immobiliers répondra à tous vos critères de recherche. De plus, notre site est régulièrement mis à jour avec de nouvelles annonces, vous permettant de trouver rapidement une location qui correspond parfaitement à vos besoins.
Ne perdez plus de temps, consultez notre site dès maintenant et trouvez votre location immobilière idéale avec PARTICULIER A PARTICULIER.
 </p>
                </div>
                <div class="col-md-6 col-12">
                    <img style="max-height: fit-content;" src="{{ asset('assets/images/post-1-01.jpg') }}"
                        alt="Location immobilière : maison, villa, terrain, appartement">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

@endsection
