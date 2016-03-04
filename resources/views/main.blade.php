@extends('layouts.main-layout')

@section("header")
    <link rel="stylesheet" href="{{asset('assets/css/map-style.css')}}">
@stop

@section('content')
    <div class="view another-view">

        <div class="navbar">
            <div class="navbar-inner">
                <div class="left">
                    <a href="#" class="link icon-only open-panel">
                        <span class="kkicon icon-menu"></span>
                    </a>
                </div>
                <div class="center sliding">post a task</div>
                <div class="right">
                    <a href="#" class="link icon-only open-panel" data-panel="right">
                        <span class="kkicon icon-alarm"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pages -->
        <div class="navbar-fixed toolbar-fixed ">

            <div class="over-lay top">
                <form @submit.prevent="locateAddress" id="locationForm">
                    <input type="search" id="address" v-model="address" class="search" placeholder="Seach location here" required>
                    <input type="submit" class="search-button" value="Search">
                    <a href="#" class="listview-icon white"><i class="fa fa-list fa-5 white"></i></a>
                </form>
            </div>

            <div id="User-Map"></div>

            <div class="over-lay bottom">
                <div class="content-block mt-10 mb-5">

                    <div class="buttons-row">
                        <a href="#tab1" class="tab-link active button button-secondary">Date</a>
                        <a href="#tab2" class="tab-link button button-secondary">Price</a>
                        <a href="#tab3" class="tab-link button button-secondary">Gender</a>
                    </div>
                </div>

                <div class="tabs">
                    <div id="tab1" class="tab active">
                        <div class="content-block mt-5 mb-10">
                            <div class="list-block mt-5 mb-0">
                                <ul>
                                    <!-- Text inputs -->
                                    <li>
                                        <div class="item-content">
                                            <div class="item-inner">
                                                <div class="item-input label">Wish a Date :</div>
                                                <div class="item-input">
                                                    <input type="date" placeholder="Birth day" value="2016-02-17">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="tab2" class="tab">
                        <div class="content-block mt-5 mb-10">
                            <div class="list-block mt-5 mb-0">
                                <ul>
                                    <!-- Text inputs -->
                                    <li>
                                        <div class="item-content">
                                            <div class="item-inner">
                                                <div class="item-input label">Rate Range : </div>
                                                <div class="item-input">
                                                    <div class="range-slider">
                                                        <input type="range" min="0" max="100" value="50" step="0.1" class="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="tab3" class="tab">
                        <div class="content-block mt-5 mb-10">
                            <div class="list-block mt-5 mb-0">
                                <ul>
                                    <!-- Text inputs -->
                                    <li>
                                        <div class="item-content">
                                            <div class="item-inner">
                                                <div class="item-input label">Choose Gender :</div>
                                                <div class="item-input">
                                                    <select class="">
                                                        <option>Female</option>
                                                        <option>Male</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>


    </div>


    @stop

    @section("footer")

            <!--Build Vue.js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.14/vue.min.js"></script>
    <!--Build Loading Overlay -->
    <script type="text/javascript" src="{{asset('assets/js/loadingoverlay.js')}}"></script>
    <!--Build Local JavaScripts -->
    <script src="{{asset('assets/js/map6.js')}}"></script>
    <!--Build Google Map API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAomTWe6-_JXMoza7hm9olIQLZ8TEq5PdY&callback=app.createMap"
            async defer></script>
@stop