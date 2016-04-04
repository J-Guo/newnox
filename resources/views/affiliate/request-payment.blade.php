@extends('layouts.affiliate-layout')

@section('content')

    <!--Top Navigation Bar -->
    @include('layouts.top-nav',['title'=>'Request Payment List'])

    <!-- Pages -->
    <div class="pages navbar-fixed toolbar-fixed">
        <div class="page no-toolbar" data-page="blog">
            <div class="page-content">
                <!-- Show Request Payment Information-->
                @if(session()->has('message') )
                    <div class="alert alert-info text-center">
                        <strong>Successful!:</strong>
                        <span>{{ session()->get('message') }}</span>
                    </div>
                @endif
                <!-- show dates nearby-->
                @if(!isset($offers) || empty($offers))
                Not Any Assigned Task
                @else
                @foreach($offers as $offer)

                <div class="card">
                    <form name="requestForm" action="{{url('request-payment/'.$offer->id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="card-content">
                            <div class="list-block media-list">
                                <ul>
                                    <li class="item-content">
                                        <div class="item-media">
                                            <div class="row">
                                                <div class="col-100">
                                                    <img src="{{url('avatars/'.$offer->task->poster->profile_photo)}}"
                                                         height="100"  width="100">
                                                @include('layouts.review-stars', ['rate' => $offer->task->poster->avgRateAsUser()])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-subtitle"><p>Price: <strong>$
                                                    {{$offer->price}}</strong></p></div>
                                            <div class="item-subtitle"><p>Date:
                                                    {{$offer->date}}</p></div>
                                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                            <div class="item-inner">
                                                @if($offer->status =="requesting")
                                                <div class="tag">
                                                    <span class="badge badge-primary badge-square text-uppercase">Requesting</span>
                                                </div>
                                                @elseif($offer->status =="assigned")
                                                <div class="row text-center">
                                                    <input type="submit"  class="button button-primary button-small" name="request" value="Request Payment" />
                                                </div>
                                                @endif
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