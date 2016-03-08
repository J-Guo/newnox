<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/img/favicons/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/img/favicons/apple-touch-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicons/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/favicons/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicons/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/img/favicons/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/img/favicons/apple-touch-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicons/apple-touch-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicons/apple-touch-icon-180x180.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicons/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicons/android-chrome-192x192.png')}}" sizes="192x192">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicons/favicon-96x96.png')}}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicons/favicon-16x16.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="{{asset('assets/img/favicons/mstile-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <title>Emlido - Feel satisfy</title>

    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/framework7/dist/css/framework7.ios.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/swipebox/src/css/swipebox.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/owl-carousel/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/owl-carousel/owl-carousel/owl.theme.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/themes/red/style.css')}}" id="theme-style">
</head>
<body class="">

<div class="statusbar-overlay"></div>
<div class="panel-overlay"></div>

<!-- Left panel -->
<div class="panel panel-left panel-reveal">
    <div class="line"></div>

    @include('layouts.emlida-header')

    <div class="list-block mt-15">
        <div class="list-group">
            <nav>
                <ul>
                    <li class="divider">
                        Main
                    </li>
                    <li>
                        <a href="{{url('task-nearby')}}" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Task Neary</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('task-list')}}" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-black-tie"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Task List</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('aprofile')}}" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-female"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Profile</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('faq')}}" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-question"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">FAQ</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('areviews')}}" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa  fa-star-o"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Review</div>
                            </div>
                        </a>
                    </li>
                    <li class="divider">
                        Tasks
                    </li>
                    <li>
                        <a href="{{url('assigned-task')}}" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-weixin"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Assignedd Task</div>
                                <div class="item-after">
                                    <span class="badge badge-secondary">5</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>

<!-- Right panel -->
<div class="panel panel-right panel-reveal">
    <div class="line"></div>

    <!--<div class="user-banner">-->
    <!--<span class="ava-box">-->
    <!--<img src="assets/img/tmp/ava4.jpg" alt="">-->
    <!--</span>-->
    <!--</div>-->

    <div class="welcome-msg">
        <h3>Hello <strong>Lu</strong>!</h3>
        <h4>How is your day going?</h4>
    </div>

    <div class="list-block mt-15">
        <div class="list-group">
            <nav class="menu">
                <ul>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="icon-man"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Profile</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="settings.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="icon-cog"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Settings</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Messages</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="icon-heart"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">I Like It</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="icon-group-work"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Friends</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="icon-exit-right"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Logout</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="list-group mt-20">
            <nav>
                <ul>
                    <li>
                        <a href="#" class="item-link item-primary close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">About APP/Website</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Views -->
<div class="views">
    <div class="view view-main">

        @yield('content')

    </div>
</div>





<script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/swipebox/src/js/jquery.swipebox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/framework7/dist/js/framework7.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/Tweetie/tweetie.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/chartjs/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/scrollAnimate/jquery.scrollAnimate.js')}}"></script>
<script src="{{asset('bower_components/owl-carousel/owl-carousel/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/jflickrfeed.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/min/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/animations.js')}}"></script>
@yield('footer')
</body>
</html>