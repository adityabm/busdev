<!DOCTYPE html>
<html lang="zxx">

@include('layouts.htmlheader')

<body>
    <div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>
    <header>
        <div class="nav-wrapper">
            <nav class="navbar navbar-default navbar-custom" data-spy="affix" data-offset-top="50">
                <div class="container">
                    <div class="row">
                        <div class="navbar-header navbar-header-custom">
                            <button type="button" class="navbar-toggle collapsed menu-icon" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <a class="navbar-logo" href="{{url('/')}}"><img src="{{asset('assets/img/logos/logo-3.png')}}" alt="logo" id="logo"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right navbar-links-custom">
                                @include('layouts.menu')
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div id="app">
        @yield('content')
    </div>
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <h3>About Us</h3>
                    <div class="mt-25"> <img src="{{asset('assets/img/logos/logo-footer.png')}}" alt="footer-logo">
                        <p class="mt-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <div class="footer-social-icons mt-25">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <p><span class="primary-color">KitaBisnis</span> © {{date('Y')}}. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    @include('layouts.basescript')
</body>

</html>