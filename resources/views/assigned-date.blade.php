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
                <form name="form" action="payment-details" method="post">
                    <div class="page-content">

                        <div class="card">

                            <div class="card-content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="item-content">
                                            <div class="item-media">
                                                <div class="row mt-15">
                                                    <div class="col-100">
                                                        <img src="images/maria.jpg" width="95">
                            
                                
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
                                                <div class="item-subtitle"><h3>Juleka Jeba</h3></div>
                                                <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                                                <div class="item-subtitle"><p>Date: 22/02/2016</p></div>
                                                <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>

                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>


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


                    </div>
                </form>
            </div>
        </div>
    </div>

@stop