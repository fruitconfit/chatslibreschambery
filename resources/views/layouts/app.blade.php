<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'M.I.A.O.U') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/compiled.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sl-1.2.5/datatables.min.css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicons/apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicons/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicons/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicons/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicons/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicons/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/favicons/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicons/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">

	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('img/favicons/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">
</head>
<body class="fixed-sn light-blue-skin">

	<!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed mdb-sidenav">
            <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="#"><img src="{{ asset('img/logo.png') }}" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Social-->
                <li>
                    <ul class="social">
                    	<li><a href="http://www.chatslibreschambery.com/" target="_blank" class="icons-sm tw-ic"><i class="fa fa-wordpress"> </i></a></li>
                        <li><a href="https://www.facebook.com/Les-Chats-Libres-de-Chambéry-197579126982613/" target="_blank" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                    </ul>
                </li>
                <!--/Social-->
                <!--Search Form-->
                <li class="d-none">
                    <form class="search-form" role="search">
                        <div class="form-group waves-light">
                            <input type="text" class="form-control" placeholder="Rechercher">
                        </div>
                    </form>
                </li>
                <!--/.Search Form-->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-lock"></i> MODULE ADMIN<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ route('users') }}" class="waves-effect">Gestion des utilisateurs</a>
                                    </li>
                                    <li class="d-none"><a href="{{route('addRole')}}" class="waves-effect">Ajout de role</a>
                                    </li>
                                    <li><a href="{{ route('groups') }}" class="waves-effect">Gestion des roles</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eur"></i> MODULE COMPTA<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ route('manageLiasse') }}" class="waves-effect">Gestion des liasses</a>
									</li>
                                    <li><a href="{{ route('manageFournisseur') }}" class="waves-effect">Gestion des fournisseurs</a>
                                    </li>
                                    <li><a href="{{ route('invoices.index') }}" class="waves-effect">Gestion des factures</a>
                                    </li>
                                    <li><a href="{{ route('manageDons') }}" class="waves-effect">Consultation des dons</a>
                                    </li>
                                    <li class="d-none"><a href="#" class="waves-effect">Consulter le bilan</a>
                                    </li>
                                    <li class="d-none"><a href="#" class="waves-effect">Consulter détail factures</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-none"><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-open"></i> MODULE COUPONS<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class="waves-effect">Editer coupon</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Consulter coupons</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Traiter coupons</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div @if (null == Auth::user()) class="d-none" @endif class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p><strong>M</strong>odules d'<strong>I</strong>nformation, d'<strong>A</strong>dministration et d'<strong>O</strong>rganisation <strong>U</strong>nifiés (M.I.A.O.U)</p>
            </div>
            <ul @if (null == Auth::user()) class="d-none" @endif class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="d-none nav-item">
                    <a class="nav-link"><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
                </li>
                <li class="d-none nav-item">
                    <a class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">Aide</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accountModify') }}"><i class="fa fa-cog"></i> <span class="clearfix d-none d-sm-inline-block">Compte</span></a>
                </li>
                <li class="d-none nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Une autre action action</a>
                        <a class="dropdown-item" href="#">Encore une autre</a>
                    </div>
                </li>
                @if (null !== Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout')}}"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Se déconnecter</span></a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

    <!--Main Layout-->
    <main>
        <div class="container-fluid mt-5">
            @yield('content')
        </div>
    </main>
    <!--Main Layout-->

    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('js/compiled.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sl-1.2.5/datatables.min.js"></script>
    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();

        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    </script>

    @yield('script')
</body>
</html>
