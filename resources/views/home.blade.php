@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="2P est un site immobilier de particulier à particulier au Maroc qui offre des annonces de location et de vente immobilières pour vacances et immobilier neuf.">
    <meta name="author" content="">
@endsection
@section('title', 'Annonce immobilière particulier à particulier')
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
        'span' => 'Bye-bye les agences immobilières',
        'title' => 'L\'immobilier de particulier à particulier sans commission',
        'text' =>
            'L\'immobilier de particulier à particulier vous permet de contourner les agences immobilières. Les annonces de promotion immobilière neuf et les annonces de particuliers offrent une plateforme directe pour acheter, louer ou vendre des biens immobiliers sans commission.',
    ])

    @include('landing.index.catalogueProduits')

    @include('landing.index.catalogueConseils')

    <section class="featured portfolio bg-white rec-pro">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 style="text-transform: none">La solution directe pour la location ou l'achat d'un bien </h2>
                    <p style="text-transform: none"> Trouvez votre maison, appartement, villa, terrain, riad, maison de
                        vacances, événement... sur <b>2p.ma</b> :
                        <b>2P</b> est le premier site immobilier au Maroc spécialisé dans les annonces et la
                        commercialisation immobilière de particulier à particulier et de promotion immobilière neuf.
                        Vous y trouverez une grande variété d'annonces, de la vente à la location de maisons,
                        d'appartements, de terrains, de villas, de studios, d'espaces professionnels tels que les plateaux
                        de bureaux, les locaux commerciaux, les showrooms, les dépôts et autres biens immobiliers. Le site
                        s'efforce de maintenir toutes les annonces à jour afin d'offrir un service optimal à ses
                        utilisateurs partout au Maroc, à Agadir, Marrakech, Casablanca, Rabat, Fès, Tanger... Grâce à ce
                        service de particulier à particulier, les propriétaires peuvent économiser sur les frais d'agence,
                        tandis que les locataires ou les acheteurs peuvent entrer directement en contact avec les
                        propriétaires.
                        Le site <b>2P</b> est donc une option intéressante pour ceux qui cherchent à louer ou à acheter un
                        bien immobilier au Maroc sans passer par une agence immobilière.
                    </p>
                </div>
                <div class="col-md-6 col-12">
                    <img style="max-height: fit-content;" src="{{ asset('assets/images/post-6-01.jpg') }}"
                        alt="Annonce immobilière particulier à particulier">
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

@endsection
@section('js')

@endsection
