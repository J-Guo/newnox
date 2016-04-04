@extends('layouts.affiliate-layout')

@section('content')

        <!--Top Navigation Bar -->
    @include('layouts.top-nav',['title'=>'Task List'])

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
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@stop
