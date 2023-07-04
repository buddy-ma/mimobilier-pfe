@extends('layouts.app')
@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="2P website">
    <meta name="author" content="">
@endsection
@section('title', $blog->title)
@section('logo', 'blue')
@section('bodyClasses', 'inner-pages hd-white')

@section('css')
    <style>
        .img-responsive {
            display: inline-block;
            max-width: 100%;
            width: 100%;
            max-height: 200px !important;
            height: auto;
        }

        .details .title {
            color: #3B84C5 !important;
            font-weight: 600 !important;
            text-transform: capitalize !important;
        }

        .admin p {
            font-weight: 500;
            color: #888;
        }

        .admin p b {
            font-weight: 800;
            color: #333;
        }

        .admin img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .news-item-descr p {
            line-height: 30px !important;
        }

        .news-item-descr h2 {
            line-height: 30px;
            font-weight: normal;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .news-item-descr h3 {
            line-height: 30px;
            font-weight: normal;
            margin-bottom: 20px;
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')

    {{-- <section class="headings">
        <div class="text-heading text-center">
        </div>
    </section> --}}

    <section class="blog blog-section bg-white mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="news-item details no-mb2">
                        <div class="news-item-text details pb-0">
                            <h2 class="title mb-4">{{ $blog->title }}</h2>
                            {{-- <div class="admin">
                                @isset($blog->user->avatar)
                                    <img src="{{ asset('storage/users/' . $blog->user->avatar) }}" alt="">
                                @else
                                    <img src="{{ asset('assets/images/default.jpg') }}" alt="">
                                @endisset

                                <p>Mis a jour par <b> {{ $blog->user->firstname }} {{ $blog->user->lastname }}</b> le
                                    {{ $blog->updated_at->translatedFormat('F j, Y') }}
                                </p>
                            </div> --}}

                            <div class="news-item-descr big-news details visib mb-0">
                                <p>
                                    {!! $blog->text !!}
                                </p>
                                @isset($blog->pdf_link)
                                    <a class="btn btn-block btn-primary mt-5 border-0 font-weight-bold" target="_blank"
                                        href="{{ asset('files/' . $blog->pdf_link) }}" style="height: 60px; line-height: 50px">
                                        <i class="fas fa-download mr-2"></i>Telecharger la brochure PDF
                                    </a>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- @include('landing.blogDetails.articleSimilaires') --}}
    {{--  @include('landing.blogDetails.footer') --}}

@endsection
@section('js')

@endsection
