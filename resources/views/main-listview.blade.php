@extends('layouts.main-layout')

@section('header')
    <style>
        input[name=search]{
            display: inline-block;
            height: 25px;
            background-image:url(assets/img/textbg.png);
            margin: 0;
            padding-left:5px;
            padding-top:5px;
            padding-bottom:5px;
            background: #fff;
            border: 1px solid #333333;
            border-top: 1px solid #c0c0c0;
            box-sizing: border-box;
            -webkit-border-radius: 1px;
            -moz-border-radius: 1px;
            vertical-align:text-bottom;
            font-size:12px;
            color:#1e1c1c;
        }

        .search-button{
            border:none;
            background-image:url(assets/img/magnifying_glass.png);
            height:35px;
            width:50px;
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
                <div class="center sliding">dates near by</div>
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
                <form  id="locationForm"  name="form" action="main" >
                    {{csrf_field()}}
                    <div class="page-content">

                        <div class="card">

                            <div class="card-content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="item-content">
                                            <input type='text' name="search" placeholder="Search by location"/>
                                            <div id='button-holder'>
                                                <input type="submit" class="search-button" value="">

                                            </div>
                                            <a href="main" class="listview-icon white"><i class="fa fa-list fa-5 white"></i></a>

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
                            </span
                            ></div>
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
                            </span
                            ></div>
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
                            </span
                            ></div>
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
                            </span
                            ></div>
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
                            </span
                            ></div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

@stop