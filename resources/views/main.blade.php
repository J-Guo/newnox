@extends('layouts.main-layout')
@section("header")

    <link rel="stylesheet" href="{{asset('assets/css/map-style.css')}}">



    <link rel="stylesheet" href="{{asset('assets/spin/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spin/css/main.css')}}">

    <style>
        .firstHead{
            color:black;
        }
        input[date]{
            width:100%;
        }
        .over-lay
        {
            position:fixed; z-index:10000; margin:0; width:100%;height:auto; background:#191919; opacity:0.9;
        }
        .top{
            top:60px;
            display:block;
        }
        .bottom{
            bottom:0px;
        }
        .bottom50{
            bottom:50px;
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
        .optional {
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
            /*-moz-border-radius-topleft: 30px;
            -webkit-border-top-left-radius: 30px;
            border-top-left-radius: 30px;
            -moz-border-radius-bottomleft: 30px;
            -webkit-border-bottom-left-radius: 30px;
            border-bottom-left-radius: 30px;

			-moz-border-radius-topright: 0px;
            -webkit-border-top-right-radius: 0px;
            border-top-right-radius: 0px;
            -moz-border-radius-bottomright: 0px;
            -webkit-border-bottom-right-radius: 0px;
            border-bottom-right-radius: 0px;
			*/
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            height: 100%;
            overflow: hidden;
            -webkit-appearance: textfield;
            background-color: white;
            -webkit-rtl-ordering: logical;
            -webkit-user-select: text;
            -webkit-box-sizing: border-box;
            border: 1px solid #848484;
            outline:0;
            height:36px;
            width: 95%;
            padding-left:20px;
            border:none;
            -webkit-appearance: none;
        }
        .btn {
            /*-moz-border-radius-topright: 30px;
            -webkit-border-top-right-radius: 30px;
            border-top-right-radius: 30px;
            -moz-border-radius-bottomright: 30px;
            -webkit-border-bottom-right-radius: 30px;
            border-bottom-right-radius: 30px;*/
            font-family: Arial;
            color: #ffffff;
            background: #d93434;
            padding: 8px 10px 8px 8px;
            text-decoration: none;
            border:none;
            width:90px;
            height:38px;
            -webkit-appearance: none;
            z-index:10000;
            left:90%;
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


        /* this is for loading page */
        /*
        .back-link a {
        color: #4ca340;
        text-decoration: none;
        border-bottom: 1px #4ca340 solid;
        }
        .back-link a:hover,
        .back-link a:focus {
            color: #408536;
            text-decoration: none;
            border-bottom: 1px #408536 solid;
        }
        h1 {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
        /*margin: 0;
        font-size: 14px;
        font-family: 'Open Sans', sans-serif;
        font-size: 32px;
        margin-bottom: 3px;
    }
    .entry-header {
        text-align: left;
        margin: 0 auto 50px auto;
        width: 80%;
        max-width: 978px;
        position: relative;
        z-index: 10001;
    }
    #demo-content {
        padding-top: 100px;
    }*/
    </style>

@stop

@section('content')






    <div class="view another-view">



        <!-- Top Navigation Bar -->
        <div class="navbar" style="height:60px">
            <div class="row no-gutter">

                <div class="toolbar-inner">
                    <div class="toolbar-inner">
                        <a href="{{url('main')}}" class="tab-link link left active">
                            <i class="fa fa-home fa-2" style="font-size: 30px;  text-align: center"></i>
                        </a>

                        <a href="{{url('mydate')}}" class="tab-link link">
                            <i class="fa fa-heartbeat fa-2" style="font-size: 30px; opacity: .6"></i>
                        </a>

                        <a href="{{url('reviews')}}" class="tab-link link">
                            <i class="fa fa-star-o fa-2" style="font-size: 30px;  opacity: .6"></i>
                        </a>
                        <a href="{{url('profile/edit')}}" class="tab-link link right">
                            <i class="fa fa-user fa-4x"  style="font-size: xx-large; opacity: .6" ></i>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="navbar">--}}
            {{--<div class="navbar-inner">--}}
                {{--<div class="left">--}}
                    {{--<a href="#" class="link icon-only open-panel">--}}
                        {{--<span class="kkicon icon-menu"></span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="center sliding">Main Page</div>--}}
                {{--<div class="right">--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}



        <!-- Pages -->
        <div class="navbar-fixed toolbar-fixed" data-page="contact">


            <div id="loader-wrapper">
                <div id="loader"></div>

                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>

            </div>

            <div class="over-lay top">
                <div class="forms">
                    <form @submit.prevent="locateAddress">
                        <p class="buttons-row" id="locationForm">

                            <input type="search" id="address" v-model="address" name="name" placeholder="Seach location here" required class="textbox">

                            <input type="submit" class="btn" value="Search">

                            <!--<input type="submit" class="btn2 ml-10" value="Search">-->
                            {{--<button id="" class="btn2 ml-10"> <i class="fa fa-2x fa-list mt-0"></i> </button>--}}
                        </p>
                    </form>
                </div>

            </div>
            <div  id="User-Map"></div>

            <div class="over-lay bottom">

            </div>

            <form id="dateForm" name="dataForm" action="{{url('post-task')}}" method="POST">
                {{csrf_field()}}
                <div class="over-lay bottom" style="left:0;">
                    <div class="content-block mt-0 mb-0">

                        <p class="buttons-row mt-5 mb-0">
                            <select name="date" style="text-align:center" class="button button-secondary">
                                <?php for($i=0;$i<=4;$i++){ ?>
                                <option value="<?php echo date('Y-m-d', strtotime("+$i days")); ?>"> <?php echo date('d-m-Y', strtotime("+$i days")); ?> </option>
                                <?php } ?>
                            </select>


                            <select name="rate" style="text-align:center" class="button button-secondary">
                                <option value="200">A$ 200</option>
                                <option value="300">A$ 300</option>
                                <option value="400">A$ 400</option>
                                <option value="500">A$ 500</option>
                                <option value="600">A$ 600</option>
                                <option value="700">A$ 700</option>
                            </select>

                            <select name="duration" style="text-align:center" class="button button-secondary">
                                <option value="1">1 hr Outing</option>
                                <option value="2">2 hrs Outing</option>
                                <option value="3">3 hrs Outing</option>
                                <option value="4">4 hrs Outing</option>
                            </select>
                        </p>

                        <div class="buttons-row  mt-5 mb-5">
                            <button class="button button-fill color-green">Request a pay date</button>
                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

@stop

@section("footer")

    <script src="{{asset('assets/spin/js/main.js')}}"></script>
    <script src="{{asset('assets/spin/js/vendor/modernizr-2.6.2.min.js')}}"></script>

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