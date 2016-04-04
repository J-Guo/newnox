@extends('layouts.main-layout')

@section('content')

        <!--Top Navigation Bar -->
        @include('layouts.top-nav',['title'=>'Release Payment'])

        <!-- Pages -->
        <div class="pages navbar-fixed toolbar-fixed">
            <div class="page no-toolbar" data-page="blog">
                <form name="form" action="{{url('release-payment')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="offerID" value="{{$offer->id}}">
                    <div class="page-content">

                        <div class="card">

                            <div class="card-content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="item-content">
                                            <div class="item-media">
                                                <div class="row">
                                                    <div class="col-100 mt-15">
                                                        <img src="{{url('avatars/'.$offer->sender->profile_photo)}}"
                                                        height="100" width="100">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-inner">
                                                <div class="item-subtitle"><h3><strong>
                                                        {{$offer->sender->display_name}}</strong></h3></div>
                                                <div class="item-subtitle"><p>Price: <strong>$
                                                        {{$offer->price}}</strong></p></div>
                                                <div class="item-subtitle"><p>Date:
                                                        {{$offer->date}}</p></div>
                                                <div class="item-subtitle"><span class="rating blog-rating">
                                                @include('layouts.review-stars',['rate' => $offer->sender->avgRateAsAffiliate()])
                                                </span></div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-block">
                            <div class="input-submit">
                               <input type="submit" class="button button-primary button-fill" value="Release Payment">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@stop