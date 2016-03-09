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
            <div class="center sliding" style="left: 0px; transform: translate3d(0px, 0px, 0px);">FAQ</div>
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

    <!-- FAQ Content-->
    <div class="page no-toolbar page-on-center">
        <div class="page-content">
            <!-- Page FAQ -->
            <div class="content-block mb-15" >

                <h3>General Questions</h3>

                <div class="accordion-list">
                    <div class="accordion-item accordion-item-expanded">
                        <div class="accordion-item-toggle">
                            Anim pariatur cliche reprehenderit
                        </div>
                        <div class="accordion-item-content" style="height: auto;">
                            Pellentesque malesuada sit amet, aliquam tellus augue, dictum enim. Duis ac nibh ac quam quam sagittis tortor. Cum sociis natoque penatibus et neque. Etiam dolor.
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-item-toggle">
                            h et. Nihil anim keffi
                        </div>
                        <div class="accordion-item-content" style="">
                            Fusce gravida, eros magna dolor, dictum sed, ullamcorper et, nonummy faucibus condimentum lorem id rutrum consectetuer lectus. Fusce ullamcorper libero vel blandit non, placerat nisl auctor quis, bibendum vel, hendrerit feugiat tortor at ipsum at sapien.
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-item-toggle">
                            coffee nulla assumenda sh
                        </div>
                        <div class="accordion-item-content">
                            Cras sit amet, libero. Duis eu mi. Pellentesque porta et, mollis tincidunt, orci ac ipsum. Integer tincidunt est pede
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-item-toggle">
                            coffee nulla assumenda sh
                        </div>
                        <div class="accordion-item-content">
                            Cras sit amet, libero. Duis eu mi. Pellentesque porta et, mollis tincidunt, orci ac ipsum. Integer tincidunt est pede
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-item-toggle">
                            coffee nulla assumenda sh
                        </div>
                        <div class="accordion-item-content">
                            Cras sit amet, libero. Duis eu mi. Pellentesque porta et, mollis tincidunt, orci ac ipsum. Integer tincidunt est pede
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit Button-->
            <div class="content-block mb-15">
                <form action="{{url('bank-detail/create')}}" method="GET" id="acceptForm">
                <input type="submit" form="acceptForm" class="button button-primary" value="Accpet">
                </form>
            </div>

        </div><!-- End Page Content-->
    </div><!-- End Page -->

    </div>

@stop