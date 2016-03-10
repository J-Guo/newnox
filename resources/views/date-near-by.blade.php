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
                <form name="form" action="payment-details" method="post">
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

                                                <div class="item-subtitle"><p>Price: <strong>${{$offer_affiliate_merged['offer']->price}}</strong></p></div>
                                                <div class="item-subtitle"><p>Date: {{$offer_affiliate_merged['offer']->date}}</p></div>
                                                <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                                <div class="item-inner">
                                                    <div class="row text-center">
                                                        <input type="submit" class="button button-primary button-small" name="confirm" value="Confirm Booking" />
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