<head>
    <title>KitaBisnis</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('assets/img/logos/favicon.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/rev-settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/switcher.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles-3.css')}}" id="colors">
    <link rel="stylesheet" href="{{asset('admin/vendor/jquery-confirm/jquery-confirm.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">

    @yield('styles')

    <style type="text/css">
        input {
            outline: none;
        }
        input[type=search] {
            -webkit-appearance: textfield;
            -webkit-box-sizing: content-box;
            font-family: inherit;
            font-size: 100%;
        }
        input::-webkit-search-decoration,
        input::-webkit-search-cancel-button {
            display: none; 
        }


        input[type=search] {
            background: #fff url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
            border: none;
            padding: 9px 10px 9px 32px;
            width: 55px;
            margin-top: 5px;
            -webkit-border-radius: 10em;
            -moz-border-radius: 10em;
            border-radius: 10em;
            
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            transition: all .5s;
        }
        input[type=search]:focus {
            width: 130px;
            background-color: #fff;
            border-color: #dededede;
        }


        input:-moz-placeholder {
            color: #999;
        }
        input::-webkit-input-placeholder {
            color: #999;
        }

        /* Demo 2 */
        #demo-2 input[type=search] {
            width: 15px;
            padding-left: 10px;
            color: transparent;
            cursor: pointer;
        }
        #demo-2 input[type=search]:hover {
            background-color: #fff;
        }
        #demo-2 input[type=search]:focus {
            width: 130px;
            padding-left: 32px;
            color: #000;
            background-color: #e6e6e6;
            cursor: auto;
        }
        #demo-2 input:-moz-placeholder {
            color: transparent;
        }
        #demo-2 input::-webkit-input-placeholder {
            color: transparent;
        }
    </style>
</head>