@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="Annonces de location vacances de particulier à particulier sur 2P, le 1er site immobilier au Maroc. Louer pas cher villa, appartement, maison, terrain, studio.">
    <meta name="author" content="">
@endsection
@section('title', 'Location de vacances particulier à particulier')
@section('logo', 'orange')
@section('bodyClasses', 'homepage-3 the-search')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/colors/orange.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/last-edit/vacances-style.css') }}">
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
        'active' => 'vacances',
        'title' => 'Location de vacances sans commission ni frais d\'agence immobilière',
        'text' =>
            'Etes-vous à la recherche d\'une location pour vos vacances ? 2p.ma vous propose des annonces de biens à louer directement de particulier à particulier. Appartements, villas, maisons, studios et bien d\'autres sont disponibles sans intermédiaires et à des prix abordables.',
    ])

    @include('landing.vacances.catalogueProduits') <section class="featured portfolio bg-white rec-pro">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 style="text-transform: none">Location de vacances de particulier à particulier </h2>
                    <p> Vous prévoyez votre prochain séjour et souhaitez trouver la location de vacances parfaite ? Faites
                        confiance à 2p.ma, votre partenaire privilégié en matière d'annonces immobilières pour des vacances
                        inoubliables.
                        Nous mettons à votre disposition une sélection exquise de biens d'exception, comprenant des villas
                        somptueuses, des appartements élégants, des studios confortables et bien plus encore. Que vous
                        rêviez d'une escapade en bord de mer, d'une retraite paisible à la campagne ou d'une expérience
                        urbaine vibrante, notre vaste choix de destinations répondra à toutes vos envies.
                        Grâce à notre interface conviviale et nos fonctionnalités de recherche avancée, vous pouvez affiner
                        vos critères selon le nombre de chambres, les équipements souhaités, les services offerts, et bien
                        d'autres encore. Toutes nos annonces sont directement publiées par les propriétaires, vous
                        permettant ainsi d'entrer en contact direct avec eux pour réserver votre hébergement en toute
                        simplicité et sans intermédiaires.
                        Profitez de votre propre espace, de l'intimité d'un foyer loin de chez vous, et créez des souvenirs
                        uniques avec vos proches. En outre, vous bénéficierez souvent de tarifs avantageux par rapport aux
                        hébergements traditionnels tels que les hôtels.
                        Laissez-nous vous guider vers votre havre de vacances idéal. Découvrez dès maintenant notre
                        sélection exclusive de biens immobiliers et réservez dès aujourd'hui pour vivre des vacances
                        inoubliables avec 2p.ma
                    </p>
                </div>
                <div class="col-md-6 col-12">
                    <img style="max-height: fit-content;" src="{{ asset('assets/images/post-2-01.jpg') }}"
                        alt="Location immobilière : maison, villa, terrain, appartement">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

@endsection
