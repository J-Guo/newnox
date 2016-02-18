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
        <div class="center sliding" style="left: 0px; transform: translate3d(0px, 0px, 0px);">Make Offer</div>
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


    <!--Make An Offer -->
    <div class="page no-toolbar page-on-center">
        <div class="page-content">
            <div class="login-view-box mt-50">

                <div class="list login-form-box">
                    <form class="form nice-label" id="offerForm" action="task-list" method="GET">

                        <div class="form-row">
                            <label for="login"><span class="icon-cash-dollar"></span></label>
                            <input type="text" id="login" placeholder="Price">
                        </div>
                        <div class="form-row">
                            <label for="email"><span class="icon-city"></span></label>
                            <input type="text" id="email" placeholder="Place">
                        </div>
                        <div class="form-row">
                            <label for="date"><span class="icon-calendar-check"></span></label>
                            <input type="date" placeholder="Birth day" value="2016-02-17">
                        </div>

                        <!-- Submit Button-->
                        <input type="submit" form="offerForm" class="button button-primary" value="Send An Offer">

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@stop