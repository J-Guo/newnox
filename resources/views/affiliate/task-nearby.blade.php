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
                <form id="taskNearby{{$key}}" name="offerForm" action="make-offer" method="POST">
                    {{csrf_field()}}
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
                                        <input type="hidden" name="task_poster" value="{{$task->task_poster}}" />
                                        <input type="hidden" name="task_id" value="{{$task->id}}" />
                                        <div class="item-subtitle"><p>Price: <strong>${{$task->price}}</strong></p></div>
                                        <input type="hidden" name="price" value="{{$task->price}}" />
                                        <div class="item-subtitle"><p>Date: {{$task->date}}</p></div>
                                        <input type="hidden" name="date" value="{{$task->date}}" />
                                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>

                                        <div class="item-inner">
                                            <div class="row text-center">
                                                <input type="submit" class="button button-primary button-small" id="makeOffer" name="makeOffer" value="Make An Offer">
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                </form> <!-- End Offer Form-->
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