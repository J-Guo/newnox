@extends('layouts.main-layout')

@section('content')

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
            <div class="page-content">
            <!-- show dates nearby-->
            @if(!isset($sentOfferArray) || empty($sentOfferArray))
            <h2>Oops, You dont get any offers from affiliates please wait for a moment</h2>
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