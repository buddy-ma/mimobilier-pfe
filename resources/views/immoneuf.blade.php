@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="Vente immobilier neuf au Maroc : publier une annonce ou rechercher des villas, appartements, maisons, terrains, studios ou bureaux en achat entre particuliers.">
    <meta name="author" content="">
@endsection
@section('title', 'Immobilier neuf - villa, appartement, terrain')
@section('logo', 'green')
@section('bodyClasses', 'homepage-3 the-search')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/colors/green.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/last-edit/immoneuf-style.css') }}">

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

        .ville-tags {
            background: #18ba60 !important;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 30px;
        }
    </style>
@endsection
@section('content')

    @include('landing.hero', [
        'active' => 'immoneuf',
        'title' => 'Découvrez une variété de biens immobiliers neufs grâce à 2P',
        'text' =>
            'Chez 2P, nous vous offrons une plateforme intuitive et efficace pour trouver facilement la propriété qui correspond parfaitement à vos critères et à votre budget. Parcourez nos annonces exclusives provenant directement des promoteurs, et plongez dans un vaste choix d\'immobilier neuf. Parcourez nos annonces provenant directement des promoteurs et explorez un large choix d\'immobilier neuf. Faites un pas vers votre avenir immobilier avec 2p.ma !',
    ])

    @include('landing.immoneuf.catalogueProduits')
    {{-- @include('landing.immoneuf.cataloguePromoteurs') --}}
    <section class="featured portfolio bg-white rec-pro">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 style="text-transform: none">Achat et vente d'immobilier neuf</h2>
                    <p> Confiez votre projet immobilier à <b>2p.ma</b> et découvrez une expérience professionnelle sans pareille. Notre engagement envers vous se traduit par une expérience transparente, pratique et personnalisée. Mettez toutes vos aspirations immobilières entre de bonnes mains et explorez dès maintenant les nombreuses opportunités qui vous attendent sur notre plateforme.
En utilisant notre plateforme, vous évitez les frais d'agence, ce qui vous permet de réaliser d'importantes économies. De plus, vous avez un contrôle total sur votre transaction en négociant directement avec les parties concernées. 
Notre équipe dévouée est là pour vous guider tout au long de votre parcours immobilier. Que vous recherchiez une villa de luxe, un appartement, un terrain ou même des appartements à location, notre site regorge de choix pour satisfaire tous les goûts et budgets.
 </p>
                </div>
                <div class="col-md-6 col-12"> <img style="max-height: fit-content;"
                        src="{{ asset('assets/images/post-3-01.jpg') }}  "
                        alt="Achat et vente d'immobilier neuf de particulier à particulier"> </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

@endsection
