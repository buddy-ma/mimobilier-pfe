<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Unice" name="description">
        <meta content="Unice" name="keywords">
        <meta content="Unice" name="author">
        <title>Buddy - Login</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('login/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login/css/iofrm-style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login/css/iofrm-theme16.css') }}">

        @livewireStyles
        <style>
            .icon-eye {
                position: absolute;
                top: 48%;
                right: 43%;
                font-size: 12px;
                z-index: 4;
                line-height: 20px;
                background-color: #29a4ff;
                border-radius: 5px;
                color: #fff;
                padding: 6px 8px;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class="form-body without-side">

            @livewire('login')

        </div>
    </body>
    <link rel="stylesheet" type="text/css" href="{{ asset('login/js/jquery.min.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/js/popper.min.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/js/bootstrap.min.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/js/main.js') }}">
    @livewireScripts
</html>
