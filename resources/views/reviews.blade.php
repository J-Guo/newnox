@extends('layouts.main-layout')

@section('content')

    <!--Top Navigation Bar -->
    @include('layouts.top-nav',['title'=>'Review List'])

    <!-- Pages -->
    <div class="pages navbar-fixed toolbar-fixed">
        <div class="page no-toolbar" data-page="blog">
            <div class="page-content">
                <!-- Show Information-->
                @if(session()->has('message') )
                    <div class="alert alert-info text-center">
                        <strong>Successful!:</strong>
                        <span>{{ session()->get('message') }}</span>
                    </div>
                @endif
                <!-- Show Reviews List-->
                @if(!isset($tasks) || empty($tasks) || $tasks->isEmpty())
                <h2>No any review right now </h2>
                @else
                @foreach($tasks as $task)
                {{--*/ $offer = $task->offers()->whereIn('status',['requested','reviewed'])->first() /*--}}
                <div class="card">
                    <form name="releaseForm" action="{{url('reviews/'.$task->id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="card-content">
                            <div class="list-block media-list">
                                <ul>
                                    <li class="item-content">
                                        <div class="item-media">
                                            <img src="{{url('avatars/'.$offer->sender->profile_photo)}}"
                                                 height="100"  width="100">
                                        </div>
                                        <div class="item-inner">

                                            <div class="item-subtitle"><p>Name:
                                                    {{$offer->sender->display_name}}</p></div>
                                            <div class="item-subtitle">
                                                @include('layouts.review-stars',['rate' => $offer->sender->avgRateAsAffiliate()])
                                            </div>
                                            <div class="item-subtitle"><p>Price: <strong>$
                                                    {{$offer->price}}</strong></p></div>
                                            <div class="item-subtitle"><p>Date:
                                                    {{$offer->date}}</p></div>
                                        </div>

                                    </li>

                                </ul>
                                <div class="card-footer">
                                    <a class="link js-add-to-fav" href="#"><i class="fa fa-heart-o mr-5"></i> Like</a>
                                    <a class="link js-add-to-fav" href="#"><i class="fa fa-plus-square-o mr-5"></i> My Profile</a>
                                    @if($task->status == 'requested')
                                        <div class="row text-center">
                                            <input type="submit"  class="button button-primary button-small" name="review" value="Make A Review" />
                                        </div>
                                    @else
                                        <span class="badge badge-primary badge-square text-uppercase">Reviewed</span>
                                    @endif
                                </div>
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