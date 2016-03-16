@extends('layouts.main-layout')

@section('content')

    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding">Reviews List</div>
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
                {{--*/ $offer = $task->offers()->where('status','released')->first() /*--}}
                <div class="card">
                    <form name="releaseForm" action="{{url('reviews/'.$task->id)}}" method="POST">
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

                                            <div class="item-subtitle"><p>Name:
                                                {{$offer->sender->display_name}}</p></div>
                                            <div class="item-subtitle"><p>Price: <strong>$
                                                {{$offer->price}}</strong></p></div>
                                            <div class="item-subtitle"><p>Date
                                                {{$offer->date}}</p></div>

                                            <div class="item-inner">
                                                <div class="row text-center">
                                                    <input type="submit"  class="button button-primary button-small" name="review" value="Make A Review" />
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