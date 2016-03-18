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

                <!-- show tasks list-->
                @if(!isset($taskList) || empty($taskList))
                    <h2>Oops, You have not send any offer</h2>
                @else
                    @foreach($taskList as $key => $offer_poster_merged)
                        <div class="card">
                        <div class="card-content">
                            <div class="list-block media-list">
                                <ul>
                                    <li class="item-content">
                                        <div class="item-media">
                                            <div class="row">
                                                <div class="col-100">
                                                    <img src="{{url('avatars/'.$offer_poster_merged['poster']->profile_photo)}}"
                                                         width="100" height="100" >

                                                @include('layouts.review-stars',['rate' =>$offer_poster_merged['poster']->avgRateAsUser()])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-subtitle"><p>Price:
                                                    <strong>${{$offer_poster_merged['offer']->price}}</strong></p></div>
                                            <div class="item-subtitle"><p>Date:
                                                    {{$offer_poster_merged['offer']->date}}</p></div>
                                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                            <div class="item-inner">
                                                <!-- Show the status of each task list -->
                                                @if($offer_poster_merged['offer']->status =="sent")
                                                <div class="tag">
                                                    <span class="badge badge-primary badge-square text-uppercase">Waiting</span>
                                                </div>
                                                @else
                                                    <div class="row text-center">
                                                        <input type="button" class="button button-primary button-small" name="submit" value="Begin Chat">
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        </div>
                    @endforeach
                @endif

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