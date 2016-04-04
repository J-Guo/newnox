@extends('layouts.main-layout')

@section('content')

    <!--Top Navigation Bar -->
    @include('layouts.top-nav',['title'=>'Release Payment List'])

    <!-- Pages -->
    <div class="pages navbar-fixed toolbar-fixed">
        <div class="page no-toolbar" data-page="blog">
            <div class="page-content">
                <!-- Show Release Payment Information-->
                @if(session()->has('message') )
                    <div class="alert alert-info text-center">
                        <strong>Successful!:</strong>
                        <span>{{ session()->get('message') }}</span>
                    </div>
                @endif

                <!-- show dates nearby-->
                @if(!isset($offers) || empty($offers) || $offers->isEmpty())
                <h2>No Any Assigned Task need to release payment</h2>
                @else
                @foreach($offers as $offer)
                <div class="card">
                <form name="releaseForm" action="{{url('release-payment/'.Crypt::encrypt($offer->id))}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <div class="row">
                                            <div class="col-100">
                                                <img src="{{url('avatars/'.$offer->sender->profile_photo)}}"
                                                     height="100"  width="100">

                                            @include('layouts.review-stars',['rate' =>$offer->sender->avgRateAsAffiliate()])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner">

                                        <div class="item-subtitle"><p>Name:
                                                {{$offer->sender->display_name}}</p></div>
                                        <div class="item-subtitle"><p>Price: <strong>$
                                                {{$offer->price}}</strong></p></div>
                                        <div class="item-subtitle"><p>Date:
                                                {{$offer->date}}</p></div>
                                        <div class="item-inner">
                                            <div class="row text-center">
                                                <input type="submit"  class="button button-primary button-small" name="release" value="Release Payment" />
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </form> <!-- End Release Payment Box -->
                </div>

                 @endforeach
                 @endif
            </div>
        </div>
    </div>
@stop