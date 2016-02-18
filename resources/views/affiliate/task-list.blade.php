@extends('layouts.affiliate-layout')

@section('content')

    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding" style="left: 0px;">Tasks List</div>
            <div class="right">
                <a href="#" class="link icon-only open-panel" data-panel="right">
                    <span class="kkicon icon-alarm"></span>
                </a>
            </div>
        </div>
    </div>

    <div class="pages navbar-fixed toolbar-fixed">
        <div class="page no-toolbar" data-page="blog">
            <div class="page-content">

                <div class="card">

                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <div class="row">
                                            <div class="col-100">
                                                <img src="images/avatar-1.jpg" width="100">


                                    <span class="rating blog-rating">
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="width:20%"></span>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                                        <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                        <div class="item-inner">
                                            <div class="tag">
                                                <span class="badge badge-primary badge-square text-uppercase">Waiting</span>
                                            </div>
                                        </div>
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
                                                <img src="images/avatar-2.jpg" width="100">


                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner">

                                        <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                                        <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                        <div class="item-inner">
                                            <div class="row text-center">
                                                <input type="button" class="button button-primary button-small" name="submit" value="Begin Chat">
                                            </div>
                                        </div>
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
                                                <img src="images/avatar-3.jpg" width="100">


                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner">

                                        <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                                        <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                        <div class="item-inner">
                                            <div class="tag">
                                                <span class="badge badge-primary badge-square text-uppercase">Waiting</span>
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
@stop

@section('footer')

    <script>
        $(':button').click(function(){
            window.location.href='assigned-task';
        })
    </script>

@stop