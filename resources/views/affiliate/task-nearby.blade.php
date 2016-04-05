@extends('layouts.affiliate-layout')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')

    <!--Top Navigation Bar -->
    @include('layouts.top-nav',['title'=>'Tasks Nearby'])

    <div class="pages navbar-fixed toolbar-fixed">
        <div class="page no-toolbar" data-page="blog">
            <div class="page-content">

                <!-- Show System Message-->
                @if(session()->has('message'))
                <div class="alert alert-info text-center">
                    <strong>System Message!:</strong>
                    <span>{{ session()->get('message') }}</span>
                </div>
                @endif
                <!-- show tasks nearby-->
                @if(!isset($postedTaskArray) || empty($postedTaskArray))
                 <h2>Oops, May do not have task right now, try it later :)</h2>
                @else
                @foreach($postedTaskArray as $key => $poster_task_merged)
                <form id="taskNearby{{$key}}" name="offerForm" action="{{url('make-offer')}}" method="GET">
                    {{csrf_field()}}
                <div class="card">
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <div class="row">
                                            <div class="col-100">
                                                <img src="{{url('avatars/'.$poster_task_merged['poster']->profile_photo)}}"
                                                     width="100" height="100">
                                            <!-- show stars based on user avage rate-->
                                            @include('layouts.review-stars',['rate' => $poster_task_merged['poster']->avgRateAsUser()])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner">
                                        <!-- Output all values of each task -->
                                        <input type="hidden" name="task_poster" value="{{$poster_task_merged['task']->task_poster}}" />
                                        <input type="hidden" name="task_id" value="{{$poster_task_merged['task']->id}}" />
                                        <div class="item-subtitle"><p>Name: {{$poster_task_merged['task']->poster->display_name}}</p></div>
                                        <div class="item-subtitle"><p>Price: <strong>${{$poster_task_merged['task']->price}}</strong></p></div>
                                        <input type="hidden" name="price" value="{{$poster_task_merged['task']->price}}" />
                                        <div class="item-subtitle"><p>Date: {{$poster_task_merged['task']->date}}</p></div>
                                        <input type="hidden" name="date" value="{{$poster_task_merged['task']->date}}" />


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
<script src="{{asset('assets/js/pages/affiliate-location.js')}}" type="text/javascript"></script>
@stop