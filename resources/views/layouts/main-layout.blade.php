<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/img/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Emlido - Feel satisfy</title>

    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/framework7/dist/css/framework7.ios.min.css">
    <link rel="stylesheet" href="bower_components/framework7/dist/css/framework7.ios.colors.min.css">
    
    <link rel="stylesheet" href="bower_components/swipebox/src/css/swipebox.css">
    <link rel="stylesheet" href="bower_components/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="bower_components/owl-carousel/owl-carousel/owl.theme.css">

    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/themes/red/style.css" id="theme-style">
    <link href="../../../public/bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    @yield('header')
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
                        Admin Console
                    </li>
                    
                    <li>
                        <a href="post-a-task" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Main View</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="user-profile" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">My Profile</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="date-near-by" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-list-ol"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Query List</div>
                                <div class="item-after">
                                    <span class="badge badge-secondary">5</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="asigned-task" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-tasks"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Assigned Task</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="gallery-3col.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-question-circle"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Help</div>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="contact.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Contact us</div>
                            </div>
                        </a>
                    </li>
                    <li class="divider">
                        Social
                    </li>
                    <li>
                        <a href="twitter.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Twitter</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="flickr.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Facebook</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="flickr.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-flickr"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Instagram</div>
                            </div>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <p style="font-size:10px; text-align:center" class="mt-25">Copyright &copy; Traxnet Technologies P/L</p>
        </div>
    </div>
	
</div>

<!-- Right panel -->
<div class="panel panel-right panel-reveal">
    <div class="line"></div>

    <div class="user-banner">
        <span class="ava-box">
            <img src="assets/img/tmp/ava4.jpg" alt="">
        </span>
    </div>

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





<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/swipebox/src/js/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="bower_components/framework7/dist/js/framework7.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="bower_components/Tweetie/tweetie.min.js"></script>
<script type="text/javascript" src="bower_components/chartjs/Chart.js"></script>
<script type="text/javascript" src="bower_components/scrollAnimate/jquery.scrollAnimate.js"></script>
<script src="bower_components/owl-carousel/owl-carousel/owl.carousel.min.js"></script>

<script type="text/javascript" src="assets/js/jflickrfeed.min.js"></script>
<script type="text/javascript" src="assets/js/min/app.js"></script>
<script type="text/javascript" src="assets/js/animations.js"></script>

@yield('footer')
</body>
</html>