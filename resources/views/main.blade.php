<?php
date_default_timezone_set("Australia/Sydney");
$today = date("d/m/Y");
?>



@extends('layouts.main-layout')
<link href="assets/themes/red/style.css" rel="stylesheet" type="text/css" />
@section("header")

    <link rel="stylesheet" href="{{asset('assets/css/map6.css')}}">

    <style>

        .over-lay
        {
            position:absolute; z-index:10000; margin:0 1% 0 1%; width:98%;height:auto; background:#666; opacity:0.9;
        }

        .top{
            top:50px;
        }

        .bottom{
            bottom:5px;
        }

        .white
        {
            color:#dbdbdb;
        }
        form {
            width:500px;
            margin:10px;
        }
        .search {
            top:-10px;
            height:30px;
            padding:15px;
            background:#999;
            border:0px solid #dbdbdb;
            color:#FFF;-webkit-appearance: none;
            font-size:medium;
            width:40%;
        }
        /*.search:hover
        {
            background-color:#FFF;
            color:#333;
        }*/
        .search-button {
            position:relative;
            padding:6px 15px;
            height:32px;
            left:-3px;
            top:-2px;
            border:2px solid #333333;
            background-color:#333333;
            color:#fafafa;
        }
        .search-button:hover  {
            background-color:#F00;
            /*color:#207cca;*/
        }

        .listview-icon
        {
            position:fixed;
            right:15px;
            font-size:35px;
            height:35px;
            width:auto;
            font-weight:100;
        }

        :optional {

            opacity: 0.6;
        }

        :optional:hover {
            opacity: 1;
        }

        .round-button {
            width:14%;
            right:20px; position:fixed;
            bottom:130px;

        }
        .round-button-circle {
            width:100%;
            border-radius:50%;

            background-repeat:no-repeat;

        }

        .rcorners3 {
            border-radius: 50%;
            background-color: #f44336;
            opacity:1;
            padding:3px 0 0 3px;
            width: 100%;
            height: 100%;
            font-size:40px;
        }
        /*.round-button-circle:hover {
            background:#ff3333;
        }
        .round-button a {
            display:block;
            float:left;
            width:100%;
            padding-top:50%;
            padding-bottom:50%;
            line-height:1em;
            margin-top:-0.5em;

            text-align:center;
            color:#e2eaf3;
            font-family:Verdana;
            font-size:1.2em;
            font-weight:bold;
            text-decoration:none;
        }*/

    </style>

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
                    <a href="main-listview" class="listview-icon white"><i class="fa fa-list fa-5 white"></i></a>
                </form>


            </div>
            <div  id="User-Map" style="height:100%;"></div>

            <div class="over-lay bottom">

            </div>

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

