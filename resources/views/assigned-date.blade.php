@extends('layouts.main-layout')

@section('content')

        <!--Top Navigation Bar -->
        @include('partials.top-nav',['active' => 2])

        <!-- Pages -->
        <div class="pages navbar-fixed toolbar-fixed">
            <div class="page no-toolbar" data-page="blog">

                <!-- Chat Room-->
                <div class="page-content">

                @if(!isset($assignedDateArray) || empty($assignedDateArray))
                <h2> You do not have any assigned date</h2>
                @else
                <!-- Chat Room Header-->
                <div class="card">
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <div class="row mt-15">
                                            <div class="col-100">
                                                <img src="{{ isset($assignedDateArray) ? url("avatars/".$assignedDateArray['affiliate']->profile_photo) :url("avatars/default.jpg")}}"
                                                     height="100" width="100">

                                        @include('layouts.review-stars',['rate' =>$assignedDateArray['affiliate']->avgRateAsAffiliate()])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-subtitle"><h3>{{$assignedDateArray['affiliate']->display_name}}</h3></div>
                                        <div class="item-subtitle"><p>Price:
                                                <strong>${{isset($assignedDateArray) ? $assignedDateArray['offer']->price:''}}</strong></p></div>
                                        <div class="item-subtitle"><p>Date:
                                                {{isset($assignedDateArray) ? $assignedDateArray['offer']->date:''}}</p></div>
                                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Chat Room Body-->
                <div class="card">
                    <div class="card-content">
                        <!-- Chat Room Content-->
                        <div id="chatRoom" class="messages messages-auto-layout">

                        <!-- Chat Message From Users-->

                        </div>
                        <form id="chatForm" action="">
                        <div class="toolbar messagebar">
                            <div class="toolbar-inner">
                                <input type="hidden" id="roomNum"
                                       value="{{isset($assignedDateArray) ? $assignedDateArray['offer']->id:'default'}}">
                                <input id="m" autocomplete="off" />
                                <button class="button button-small">Send</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                     @endif

                    </div>

                <!-- End Chat Room-->


            </div>
        </div>
    </div>

@stop

@section('footer')
<!-- Socket io-->
<script src="{{asset('assets/js/socket.io.js')}}"></script>
<script src="{{asset('assets/js/pages/chat-client.js')}}" type="text/javascript"></script>
@stop