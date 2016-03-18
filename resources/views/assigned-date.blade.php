@extends('layouts.main-layout')

@section('content')

    <div class="view another-view">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="left">
                    <a href="#" class="link icon-only open-panel">
                        <span class="kkicon icon-menu"></span>
                    </a>
                </div>
                <div class="center sliding">Assigned Date</div>
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

                <!-- Chat Room-->
                <div class="page-content">
                <form name="form" action="payment-details" method="post">

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
                                <div class="messages messages-auto-layout">
                                    <div class="messages-date">Sunday, Feb 9 <span>12:58</span></div>
                                    <div class="message message-sent message-first">
                                        <div class="message-text">Hello</div>
                                    </div>
                                    <div class="message message-sent message-last message-with-tail">
                                        <div class="message-text">How are you?</div>
                                    </div>
                                    <div class="message message-with-avatar message-last message-received message-with-tail message-first">
                                        <div class="message-name">Kate</div>
                                        <div class="message-text">I am fine, thanks</div>
                                        <div style="background-image:url(http://lorempixel.com/output/people-q-c-100-100-9.jpg)" class="message-avatar"></div>
                                    </div>
                                    <div class="messages-date">Sunday, Feb 3 <span>11:58</span></div>
                                    <div class="message message-sent message-first">
                                        <div class="message-text">Nice photo?</div>
                                    </div>
                                    <div class="message message-with-avatar message-last message-received message-with-tail message-first">
                                        <div class="message-name">Kate</div>
                                        <div class="message-text">Wow, awesome!</div>
                                        <div style="background-image:url(http://lorempixel.com/output/people-q-c-100-100-9.jpg)" class="message-avatar"></div>
                                    </div>


                                </div>
                                <div class="toolbar messagebar">
                                    <div class="toolbar-inner">
                                        <textarea placeholder="Message" class=""></textarea>
                                        <button class="button button-small">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                     @endif
                     </form>
                    </div>

                <!-- End Chat Room-->


            </div>
        </div>
    </div>

@stop