@extends('layouts.affiliate-layout')

@section('header')
<!-- Five Stars Review Form Style-->
<link rel="stylesheet" href="{{asset('assets/css/pages/review-form.css')}}">
@stop

@section('content')
    <div class="view another-view">
        <!--Top Navigation Bar -->
        @include('layouts.top-nav',['title'=>'Review'])

        <!-- Pages -->
        <div class="pages navbar-fixed toolbar-fixed">
            <div class="page no-toolbar" data-page="blog">

                <div class="page-content">
                    <form name="form" action="{{url('areviews')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="offerid" value="{{$offer->id}}">
                        <div class="card">

                            <div class="card-content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="item-content">
                                            <div class="item-media">
                                                <div class="row">
                                                    <div class="col-100 mt-15">
                                                        <img src="{{url('avatars/'.$offer->task->poster->profile_photo)}}"
                                                             width="100" height="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-inner">
                                                <div class="item-subtitle"><h3><strong>
                                                        {{$offer->task->poster->display_name}}</strong></h3></div>
                                                <div class="item-subtitle"><p>Price: <strong>$
                                                        {{$offer->price}}</strong></p></div>
                                                <div class="item-subtitle"><p>Date:
                                                        {{$offer->date}}</p></div>
                                                <div class="item-subtitle"><span class="rating blog-rating">
                                            @include('layouts.review-stars',['rate' =>$offer->task->poster->avgRateAsUser()])
                                    </span></div>
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

                                            <div class="item-inner">

                                        <!-- Review Form-->
                                        <div class="acidjs-rating-stars">
                                            <h4>Please Review This Task</h4>
                                            <input type="radio" name="rating" id="rating-0" value="5" /><label for="rating-0"></label>
                                            <input type="radio" name="rating" id="rating-1" value="4" /><label for="rating-1"></label>
                                            <input type="radio" checked="checked" name="rating" id="rating-2" value="3" /><label for="rating-2"></label>
                                            <input type="radio" name="rating" id="rating-3" value="2" /><label for="rating-3"></label>
                                            <input type="radio" name="rating" id="rating-4"  value="1" /><label for="rating-4"></label>
                                        </div>
                                        <div class="content-block">
                                            <input type="submit" class="button button-primary mb-10" name="makeReview" value="Thanks your stars" />
                                        </div>

                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
@stop