@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow" />
    <meta name="description"
        content="Sur 2p Maroc, vous pouvez accéder aux dernières actualités et conseils immobiliers pour tout savoir sur l'achat, la vente et la location de biens immobiliers.">
    <meta name="author" content="">
@endsection
@section('title', 'Dernières actualités et conseils immobiliers')
@section('logo', 'red')
@section('bodyClasses', 'conseils homepage-3 the-search')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/colors/red.css') }}">

    <style>
        .tags {
            background: #555 !important;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 30px;
        }

        .articlesHub__menu {
            color: #495960;
            text-align: center;
            width: 100%;
            height: 50px;
            top: 70px;
            left: 0;
            background: #fff;
        }

        .articlesHub__menu__container {
            padding: 0 20px;
            margin: auto;
            text-align: left;
            width: 100%;
        }

        .articlesHub__menu__content {
            display: inline-block;
            white-space: nowrap;
            position: relative;
        }

        .articlesHub__menu__item.selected {
            border-width: 5px;
            border-color: rgb(225, 25, 111);
            color: rgb(225, 25, 111);
        }

        .articlesHub__menu__item:focus,
        .articlesHub__menu__item:hover,
        .articlesHub__menu__item:visited {
            color: #495960;
            text-decoration: none;
        }

        .articlesHub__menu__item {
            padding: 0 20px;
            height: 50px;
            line-height: 60px;
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            color: #495960;
            cursor: pointer;
            -webkit-transition: border-width .2s;
            -moz-transition: border-width .2s;
            -o-transition: border-width .2s;
            -ms-transition: border-width ease .2s;
            transition: border-width .2s;
            border-bottom: 0 solid #495960;
        }

        .articlesHub__menu__item i.fa {
            font-size: 18px;
        }

        .caretForSmallMenu,
        .textForSmallMenu {
            display: none;
        }

        .articlesHub__menu__item i.fa {
            font-size: 18px;
        }

        .articlesHub__articles-header {
            font-size: 18px;
            margin-top: 50px;
            display: block;
            line-height: 30px;
            background: #495960;
            overflow: hidden;
            -webkit-transition: background .5s, -webkit-transform .5s, opacity .5s;
            -moz-transition: background .5s, -moz-transform .5s, opacity .5s;
            -o-transition: background .5s, -o-transform .5s, opacity .5s;
            -ms-transition: background ease .5s, -ms-transform ease .5s, opacity ease .5s;
            transition: background .5s, transform .5s, opacity .5s;
        }

        .articlesHub__articles-header .articlesHub__articles-header__content {
            max-width: 1080px;
            padding: 40px 20px;
            margin: auto;
            color: #fff;
        }

        .articlesHub__articles-header .articlesHub__articles-header__content h1 {
            font-size: 45px;
            line-height: 50px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .articlesHub__articles-header .articlesHub__articles-header__content .metaDescription {
            font-size: 20px;
            line-height: 30px;
        }

        @media screen and (max-width: 600px) {
            .articlesHub__menu__container {
                max-width: 1080px;
                padding: 0 20px;
                margin: auto;
                text-align: left;
                width: 100%;
                overflow-x: auto;
            }

            .articlesHub__menu.smallMenuEnabled {
                height: auto;
            }

            .articlesHub__menu__container {
                padding: 0 10px;
            }

            .articlesHub__menu.smallMenuEnabled .articlesHub__menu__content {
                position: relative;
                border-width: 0;
                display: block;
                white-space: nowrap;
            }

            .articlesHub__menu.smallMenuEnabled .articlesHub__menu__item.selected {
                height: 50px;
                opacity: 1;
                -ms-filter: none;
                filter: none;
                border-width: 5px;
            }

            .articlesHub__menu.smallMenuEnabled .articlesHub__menu__item {
                -webkit-transition: height .3s, opacity .3s;
                -moz-transition: height .3s, opacity .3s;
                -o-transition: height .3s, opacity .3s;
                -ms-transition: height ease .3s, opacity ease .3s;
                transition: height .3s, opacity .3s;
                height: 0;
                opacity: 0;
                overflow: hidden;
                line-height: 50px;
                display: block;
                padding: 0;
                border-bottom: 0 solid #495960;
            }

            .articlesHub__menu.smallMenuEnabled .iconForBigMenu {
                display: none;
            }

            .articlesHub__menu.smallMenuEnabled .textForSmallMenu {
                display: inline-block;
            }

            .articlesHub__menu.smallMenuEnabled .articlesHub__menu__item.selected .caretForSmallMenu {
                opacity: 1;
                -ms-filter: none;
                filter: none;
            }

            .articlesHub__menu.smallMenuEnabled .articlesHub__menu__item .caretForSmallMenu {
                display: inline-block;
                opacity: 0;
                -webkit-transition: .3s;
                -moz-transition: .3s;
                -o-transition: .3s;
                -ms-transition: all ease .3s;
                transition: .3s;
            }
        }
    </style>
@endsection
@section('content')

    @include('landing.conseils.filterTags')

    <section class="featured portfolio bg-white rec-pro">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 style="text-transform: none">Les clés du succès pour vos projets immobiliers</h2>
                    <h3 style="text-transform: none">Trouvez votre chez-vous avec notre aide</h3>
					<p>Restez à jour avec les dernières réglementations, conseils, obligations, formalités et actualités du secteur immobilier au Maroc, en matière d'achat, de vente ou de location immobilières. Notre plateforme vous offre un accès privilégié à toutes ces informations essentielles. 
					Que vous soyez un acheteur, un vendeur, ou un locataire, nous vous fournissons les conseils pertinents pour vous guider dans vos décisions. De plus, nous vous tenons informés des obligations légales afin que vous puissiez mener vos transactions en toute conformité. 
					Soyez au fait des actualités récentes du marché immobilier marocain et restez informé des formalités requises pour garantir le succès de vos projets immobiliers.</p>
                </div>
                <div class="col-md-6 col-12">
                    <img style="max-height: fit-content;"
                        src="{{ asset('assets/images/post-5-01.jpg') }}"
                        alt="Annonce immobilière particulier à particulier">
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        function tags($t) {
            console.log($t);
            $('#search').val($t);
            $('#decouvrezMaroc').submit();
        }
    </script>
@endsection
