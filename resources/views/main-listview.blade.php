@extends('layouts.main-layout')
<link href="assets/themes/red/style.css" rel="stylesheet" type="text/css" />
@section("header")



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
        <div class="pages navbar-fixed toolbar-fixed">

            <div class="page no-toolbar" data-page="blog">
                <form @submit.prevent="locateAddress" id="locationForm"  name="form" action="payment-details" >
                    {{csrf_field()}}
                    <div class="page-content">
                        <div class="over-lay top mb-5">

                            <div class="content-block mb-5 mt-5">
                                <p class="buttons-row">
                                    <button class="button button-primary"><i class="fa fa fa-map-signs m-r-5"></i></button>
                                    <button class="button button-primary active"><i class="fa fa-envelope-o m-r-5"></i></button>
                                    <button class="button button-primary"><i class="fa fa-envelope-o m-r-5"></i></button>
                                    <button class="button button-primary"><i class="fa fa-envelope-o m-r-5"></i></button>
                                    <!--<a href="post-a-task" class="button button-primary"><i class="fa fa-2x fa-envelope-o m-r-5"></i></a>-->
                                </p>
                            </div>

                            <div class="card">
                                <div class="card-content">
                                    <div class="list-block media-list">
                                        <ul>
                                            <li class="item-content">
                                                <div class="item-media">
                                                    <div class="row">
                                                        <div class="col-100">
                                                            <img src="images/Untitled.jpg" width="85">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-inner">


                                                    <div class="item-subtitle"><p>David James Cameron</p></div>
                                                    <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-content">
                                    <div class="list-block media-list">
                                        <ul>
                                            <li class="item-content">
                                                <div class="item-media">
                                                    <div class="row">
                                                        <div class="col-100">
                                                            <img src="images/Untitled.jpg" width="85">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-inner">


                                                    <div class="item-subtitle"><p>David James Cameron</p></div>
                                                    <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-content">
                                    <div class="list-block media-list">
                                        <ul>
                                            <li class="item-content">
                                                <div class="item-media">
                                                    <div class="row">
                                                        <div class="col-100">
                                                            <img src="images/Untitled.jpg" width="85">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-inner">


                                                    <div class="item-subtitle"><p>David James Cameron</p></div>
                                                    <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-content">
                                    <div class="list-block media-list">
                                        <ul>
                                            <li class="item-content">
                                                <div class="item-media">
                                                    <div class="row">
                                                        <div class="col-100">
                                                            <img src="images/Untitled.jpg" width="85">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-inner">


                                                    <div class="item-subtitle"><p>David James Cameron</p></div>
                                                    <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="list-block media-list">
                                        <ul>
                                            <li class="item-content">
                                                <div class="item-media">
                                                    <div class="row">
                                                        <div class="col-100">
                                                            <img src="images/Untitled.jpg" width="85">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-inner">


                                                    <div class="item-subtitle"><p>David James Cameron</p></div>
                                                    <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
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

    </div>


    @stop

    @section("footer")

            <!--Build Vue.js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.14/vue.min.js"></script>
    <!--Build Loading Overlay -->
    <script type="text/javascript" src="{{asset('assets/js/loadingoverlay.js')}}"></script>

@stop