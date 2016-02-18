@extends('layouts.affiliate-layout')

@section('content')

    <!-- Navigation Bar-->
    <div class="navbar anim-navbar">

        <div class="navbar-inner navbar-on-left">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding" style="left: 0px; transform: translate3d(-614px, 0px, 0px);">Notifications</div>
            <div class="right">
                <a href="#" class="link icon-only open-panel" data-panel="right">
                    <span class="kkicon icon-alarm"></span>
                </a>
            </div>
        </div><div class="navbar-inner navbar-on-center">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding" style="left: 0px; transform: translate3d(0px, 0px, 0px);">Personal Detail</div>
            <div class="right">
                <a href="#" class="link icon-only open-panel" data-panel="right">
                    <span class="kkicon icon-alarm"></span>
                </a>
            </div>
        </div>
    </div>


    <!-- Notification -->
    <div class="pages navbar-fixed toolbar-fixed ">

        <div data-page="notifications" class="page page-on-left">

            <div class="page-content">

                <div class="content-block">
                    <p>
                        With Notifications component you can show required messages that looks like Push (or Local) iOS notifications.
                    </p>
                </div>

                <div class="content-block">
                    <p><a href="#" class="button button-secondary button-fill notification-default">Default notification</a></p>
                    <p><a href="#" class="button button-secondary button-fill notification-full">Full-layout notification</a></p>
                    <p><a href="#" class="button button-secondary button-fill notification-custom">With custom image</a></p>
                    <p><a href="#" class="button button-secondary button-fill notification-callback">With callback on close</a></p>
                </div>

            </div>
        </div>


        <!--Affiliate Personal  -->
        <div class="page no-toolbar page-on-center">
            <div class="page-content">
            <div class="login-view-box mt-50">

            <div class="list login-form-box">
                <form class="form nice-label" id="affiliateDetail" action="aprofile" method="GET">

                    <div class="form-row">
                        <label for="login"><span class="icon-woman"></span></label>
                        <input type="text" id="login" placeholder="Your Name">
                    </div>
                    <div class="form-row">
                        <label for="email"><span class="icon-home2"></span></label>
                        <input type="email" id="email" placeholder="Bank Name">
                    </div>
                    <div class="form-row">
                        <label for="email"><span class="icon-bag-dollar"></span></label>
                        <input type="email" id="email" placeholder="BSB">
                    </div>
                    <div class="form-row">
                        <label for="email"><span class="icon-at-sign"></span></label>
                        <input type="email" id="email" placeholder="Account No.">
                    </div>

                    <!-- Submit Button-->
                    <input type="submit" form="affiliateDetail" class="button button-primary" value="Submit">

                </form>
            </div>
            </div>
            </div>
         </div>

    </div>


@stop