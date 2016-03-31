@extends('layouts.main-layout')
@section("header")

    <link rel="stylesheet" href="{{asset('assets/css/map-style.css')}}">

    <style>

        input[date]{
            width:100%;
        }

        .green{
            background-color:#3D7A3E;
            border:#3D7A3E;
            border-left:#3d7a3e;
        }

        .over-lay
        {
            position:fixed; z-index:10000; margin:0; width:100%;height:auto; background:#666; opacity:0.9;
        }

        .top{
            top:44px;
        }

        .bottom{
            bottom:0px;
            left: 0px;
        }

        .bottom50{
            bottom:50px;
        }

        .right{
            right:20px;
        }

        .left{
            left:20px;
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
                    </form>
                </div>

            </div>
            <div  id="User-Map"></div>

            <div class="over-lay bottom">

            </div>

            <form id="dateForm" name="dataForm" action="{{url('post-task')}}" method="POST">
                {{csrf_field()}}
                <div class="over-lay bottom">
                    <div class="content-block mt-0 mb-0">

                        <p class="buttons-row mt-5 mb-0">
                            <a href="#" data-picker=".picker-1" class="open-picker tab-link button button-secondary">Date</a>
                            <a href="#" data-picker=".picker-2" class="open-picker tab-link button button-secondary">Price</a>
                            <a href="#" data-picker=".picker-3" class="open-picker tab-link button button-secondary">Hours</a>
                        </p>


                        <div class="buttons-row  mt-5 mb-5">
                            <button class="button button-secondary button-fill">Request a pay date</button>
                        </div>

                    </div>

                    <div class="picker-modal picker-1" style="height:auto; background-color:#6d6d72;bottom:5px;opacity:1">
                        <div class="picker-modal-inner mt-10  mr-30 ml-30">
                            <div class="content-block mt-0"><div class="right mr-20"><a href="#" class="button button-secondary button-fill button-small close-picker">X</a></div>
                                <h4 style="font-size:18px">Choose your date here</h4>
                                <p><input type="date" name="date" placeholder="Birth day" value="2016-03-31"  style="width:100%;text-align:center;height:35px;font-size:20px; "></p>
                            </div>
                        </div>
                    </div>


                    <div class="picker-modal picker-2" style="height:auto; background-color:#6d6d72;bottom:5px;opacity:1">
                        <div class="picker-modal-inner mt-10  mr-30 ml-30">
                            <div class="list-block">
                                <ul>
                                    <li>
                                        <div class="item-content">
                                            <div class="item-inner">
                                                <div class="item-input label">Select a Rate</div>
                                                <div class="item-input">
                                                    <select name="rate" class="ml-5">
                                                        <option value="200">A$ 200</option>
                                                        <option value="300">A$ 300</option>
                                                        <option value="400">A$ 400</option>
                                                        <option value="500">A$ 500</option>
                                                        <option value="600">A$ 600</option>
                                                        <option value="700">A$ 700</option>
                                                    </select>
                                                </div><a href="#" class="button button-secondary button-fill button-small close-picker">X</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="picker-modal picker-3" style="height:140px; background-color:#6d6d72;bottom:5px;opacity:1">
                        <div class="picker-modal-inner mt-10  mr-30 ml-30">
                            <div class="list-block">
                                <ul>
                                    <li>
                                        <div class="item-content">
                                            <div class="item-inner">
                                                <div class="item-input label">Select Hours</div>
                                                <div class="item-input">
                                                    <select name="duration" class="ml-5">
                                                        <option value="1">1 Hour Outting</option>
                                                        <option value="2">2 Hours Outting</option>
                                                        <option value="3">3 Hours Outting</option>
                                                        <option value="4">4 Hours Outting</option>
                                                    </select>
                                                </div><a href="#" class="button button-secondary button-fill button-small close-picker">X</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <h4 align="center">Total hour rate: A$ 500</h4>
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
