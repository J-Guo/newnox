@extends('layouts.main-layout')
@section("header")

    <link rel="stylesheet" href="{{asset('assets/css/map-style.css')}}">

    <style>

        .over-lay
        {
            position:fixed; z-index:10000; margin:0; width:100%;height:auto; background:#666; opacity:0.9;
        }

        .top{
            top:44px;
        }

        .bottom{
            bottom:0px;
        }

        .right{
            right:20px;
        }

        .white
        {
            color:#dbdbdb;
        }
        form {
            /*width:80%;*/
            margin:5px 10px;
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

        .textbox {
            -moz-border-radius-topleft: 30px;
            -webkit-border-top-left-radius: 30px;
            border-top-left-radius: 30px;
            -moz-border-radius-bottomleft: 30px;
            -webkit-border-bottom-left-radius: 30px;
            border-bottom-left-radius: 30px;
            border: 1px solid #848484;
            outline:0;
            height:35px;
            width: 95%;
            padding-left:20px;
            border:none;
            -webkit-appearance: none;
        }

        .btn {
            -moz-border-radius-topright: 30px;
            -webkit-border-top-right-radius: 30px;
            border-top-right-radius: 30px;
            -moz-border-radius-bottomright: 30px;
            -webkit-border-bottom-right-radius: 30px;
            border-bottom-right-radius: 30px;
            font-family: Arial;
            color: #ffffff;
            background: #d93434;
            padding: 8px 10px 8px 8px;
            text-decoration: none;
            border:none;
            width:60px;
            height:36px;
            -webkit-appearance: none;
            z-index:10000;
        }


        .btn:hover {
            background: #e60000;
            text-decoration: none;
        }


        .btn2 {
            -moz-border-radius-top: 30px;
            -webkit-border-top-radius: 30px;
            border-top-radius: 30px;
            -moz-border-radius-bottom: 30px;
            -webkit-border-bottom-radius: 30px;
            border-bottom-radius: 30px;
            font-family: Arial;
            color: #ffffff;
            background: #d93434;
            padding: 8px 10px 8px 8px;
            text-decoration: none;
            border:none;
            width:60px;
            height:36px;
            -webkit-appearance: none;

        }

        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color:#2c2c2c;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: #2c2c2c;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: #2c2c2c;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: #2c2c2c;
        }

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
        <div class="navbar-fixed toolbar-fixed" data-page="contact">

            <div class="over-lay top">
                <div class="forms">
                    <form @submit.prevent="locateAddress">
                        <p class="buttons-row" id="locationForm">
                            <!--    <div class="input-text">-->


                            <input type="search" id="address" v-model="address" name="name" placeholder="Seach location here" required class="textbox">

                            <input type="submit" class="btn" value="Search">


                            <!--<input type="submit" class="btn2 ml-10" value="Search">-->
                            <button id="" class="btn2 ml-10"> <i class="fa fa-2x fa-list mt-0"></i> </button>
                        </p>
                        <!--</div>
                  	</div>-->
                    </form>
                </div>
                <!-- <form @submit.prevent="locateAddress" id="locationForm">
                <input type="search" id="address" v-model="address" class="search" placeholder="Seach location here" required>
                <input type="submit" class="search-button" value="Search">
                <a href="post-a-task-list" class="listview-icon white"><i class="fa fa-list fa-5 white"></i></a>
            </form>-->


            </div>
            <div  id="User-Map" style="height:100%;"></div>

            <div class="over-lay bottom">

            </div>

            <form id="dateForm" name="dataForm" action="{{url('post-task')}}" method="POST">
                {{csrf_field()}}
            <div class="over-lay bottom">
                <div class="content-block mt-5 mb-0">

                    <div class="buttons-row">
                        <a href="#date" class="tab-link active button button-secondary">Date</a>
                        <a href="#rate" class="tab-link button button-secondary">Price</a>
                        <a href="#gender" class="tab-link button button-secondary">Hours</a>
                    </div>
                </div>

                <div class="tabs">
                    <div id="date" class="tab active">
                        <div class="content-block mt-5 mb-5">
                            <div class="list-block mt-5 mb-0">
                                <ul>
                                    <!-- Text inputs -->
                                    <li>
                                        <div class="item-content">
                                            <div class="item-inner">
                                                <div class="item-input label">Wish a Date :</div>
                                                <div class="item-input">
                                                    <input type="date" name="date" placeholder="Birth day" value="2016-02-17">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="rate" class="tab">
                        <div class="content-block mt-5 mb-5">
                            <div class="list-block mt-5 mb-0">
                                <ul>
                                    <!-- Text inputs -->
                                    <li>
                                        <div class="item-content">
                                            <div class="item-inner">
                                                <div class="item-input label">Rate Range : </div>
                                                <div class="item-input">
                                                    <div class="range-slider">
                                                        <input type="range" name="price" min="200" max="1000" value="250" step="50">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="gender" class="tab">
                        <div class="content-block mt-5 mb-5">
                            <div class="list-block mt-5 mb-0">
                                <ul>
                                    <li>
                                        <div class="item-content mr-20">
                                            <div class="item-inner">
                                                <div class="item-title label">Date Duration</div>
                                                <div class="item-input">
                                                    <select class="ml-5">
                                                        <option>1 Hour Outting</option>
                                                        <option>2 Hours Outting</option>
                                                        <option>3 Hours Outting</option>
                                                        <option>4 Hours Outting</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="item-content mr-20">
                                            <div class="item-inner">
                                                <span style="text-align:center">$230/hr Only</span>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row text-center ml-10 mr-10 mt-10">
                                            <input type="submit" class="button button-primary mb-10" name="submit"
                                                   value="Submit for Date">
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            </form>

        </div>
    </div>

@stop

@section("footer")

    <!--Build Vue.js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.14/vue.min.js"></script>
    <!--Build Loading Overlay -->
    <script type="text/javascript" src="{{asset('assets/js/loadingoverlay.js')}}"></script>
    <!--Build Local JavaScripts -->
    <script src="{{asset('assets/js/google-map.js')}}"></script>
    <!--Build Google Map API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAomTWe6-_JXMoza7hm9olIQLZ8TEq5PdY&callback=app.createMap"
            async defer></script>
@stop
