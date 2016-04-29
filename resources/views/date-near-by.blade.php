@extends('layouts.main-layout')

@section('content')

    <!--Top Navigation Bar -->
    {{--@include('layouts.top-nav',['title'=>'Date Nearby'])--}}
    @include('partials.top-nav',['active' => 2])

    <!-- Pages -->
    <div class="pages navbar-fixed toolbar-fixed">
        <div class="page no-toolbar" data-page="blog">
            <div class="page-content">



            <!-- Show Braintree Transaction Errors-->
            @if(session()->has('transactionError'))
            <div class="alert alert-danger text-center">
                <strong>Failed!:</strong>
                <span>{{ session()->get('transactionError') }}</span>
            </div>
            @endif
            <!-- Show Duplicated Task Errors-->
            @if(session()->has('taskError'))
            <div class="alert alert-danger text-center">
                <strong>Failed!:</strong>
                <span>{{ session()->get('taskError') }}</span>
            </div>
            @endif

            <!-- show dates nearby-->
            @if(!isset($sentOfferArray) || empty($sentOfferArray))
            {{--<h2>Oops, You dont get any offers from affiliates please wait for a moment</h2>--}}

            <!-- Task Poster Profile -->
            @if(isset($posted_task) && count($posted_task) > 0)
                <div class="card">
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <div class="row mt-15">
                                            <div class="col-100">
                                                <img src="{{ isset($posted_task) ? url("avatars/".$posted_task->poster->profile_photo) :url("avatars/default.jpg")}}"
                                                     height="100" width="100">

                                                @include('layouts.review-stars',['rate' =>$posted_task->poster->avgRateAsAffiliate()])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-subtitle"><h3>Your Task Info</h3></div>
                                        <div class="item-subtitle"><p>Price:
                                                <strong>${{isset($posted_task) ? $posted_task->price:''}}</strong></p></div>
                                        <div class="item-subtitle"><p>Date:
                                                {{isset($posted_task) ? $posted_task->date:''}}</p></div>
                                        <div class="item-subtitle">
                                            <div class="tag">
                                                <span class="badge badge-primary badge-square text-uppercase">Waiting For Offer</span>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @else
                @foreach($sentOfferArray as $offer_affiliate_merged)
                <form id="confirmForm" action="{{url('confirm-date')}}" method="post">
                    {{csrf_field()}}

                        <div class="card">
                            <div class="card-content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="item-content">
                                            <div class="item-media">
                                                <div class="row">
                                                    <div class="col-100">
                                                        <img src="{{url('avatars/'.$offer_affiliate_merged['sender']->profile_photo)}}"
                                                           height="100"  width="100">

                                                    @include('layouts.review-stars',['rate' => $offer_affiliate_merged['sender']->avgRateAsAffiliate()])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-inner">

                                                <div class="item-subtitle"><p>Name: {{$offer_affiliate_merged['offer']->sender->display_name}}</p></div>
                                                <div class="item-subtitle"><p>Price: <strong>${{$offer_affiliate_merged['offer']->price}}</strong></p></div>
                                                <div class="item-subtitle"><p>Date: {{$offer_affiliate_merged['offer']->date}}</p></div>
                                                <input type="hidden" name="offer_maker"
                                                       value="{{$offer_affiliate_merged['offer']->offer_maker}}" />
                                                <input type="hidden" name="offer_id"
                                                       value="{{Crypt::encrypt($offer_affiliate_merged['offer']->id)}}" />
                                                <div class="item-inner">
                                                    <div class="row text-center">
                                                        <input type="submit"  class="button button-primary button-small" name="confirm" value="Confirm Date" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </form>    <!-- End Offer Form-->
                    @endforeach
            @endif
            <!-- End dates Nearby-->

            </div>
        </div>
    </div>
@stop