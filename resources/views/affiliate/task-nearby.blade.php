@extends('layouts.affiliate-layout')

@section('content')

    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding" style="left: 0px;">Tasks Nearby</div>
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

                <!-- show tasks nearby-->
                @if(!isset($posted_tasks))
                 <h2>Oops, May do not have task right now, try it later :)</h2>
                @else
                @foreach($posted_tasks as $key => $task)
                <div class="card">
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <div class="row">
                                            <div class="col-100">
                                                <img src="images/avatar-3.jpg" width="100">

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
                                        <!-- Output all values of each task -->
                                        <div class="item-subtitle"><p>Price: <strong>${{$task->price}}</strong></p></div>
                                        <div class="item-subtitle"><p>Date: {{$task->date}}</p></div>
                                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                        <div class="item-inner">
                                            <div class="row text-center">
                                                <input type="button" class="button button-primary button-small" name="submit" value="Make An Offer">
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            <!-- End tasks Nearby-->

            </div>
        </div>
    </div>
@stop

@section('footer')

    <script>
        $(':button').click(function(){
            window.location.href='make-offer';
        })
    </script>

@stop