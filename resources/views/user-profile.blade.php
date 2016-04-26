@extends('layouts.main-layout')

@section('content') 
<div class="view another-view">

    <!--Top Navigation Bar -->
    {{--@include('layouts.top-nav',['title'=>'Profile'])--}}
    <div class="navbar" style="height:60px">
        <div class="row no-gutter">

            <div class="toolbar-inner">
                <div class="toolbar-inner">
                    <a href="{{url('main')}}" class="tab-link link left active">
                        <i class="fa fa-home fa-2" style="font-size: 30px; opacity: .6; text-align: center"></i>
                    </a>

                    <a href="{{url('mydate')}}" class="tab-link link">
                        <i class="fa fa-heartbeat fa-2" style="font-size: 30px; opacity: .6 "></i>
                    </a>

                    <a href="{{url('reviews')}}" class="tab-link link">
                        <i class="fa fa-star-o fa-2" style="font-size: 30px;  opacity: .6"></i>
                    </a>
                    <a href="{{url('profile/edit')}}" class="tab-link link right">
                        <i class="fa fa-user fa-4x"  style="font-size: xx-large; " ></i>

                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Pages -->
    <div class="pages navbar-fixed toolbar-fixed ">
        <div data-page="dashboard-1" class="page ">
            <div class="page-content">
    
                <div class="nice-header header-fix-top">
    
                    <div class="ava-box row">
                        <!--<div class="col-33">
                            <a href="#" class="button-header mt-15">
                                <span>
                                    <span class="icon-heart"></span>
                                </span>
                            </a>
                        </div>-->
                        <div class="col-100">
                            <img src="{{ isset($imageURL) ? url("avatars/".$imageURL) :url("avatars/default.jpg")}}"
                                 class="ava" alt=""/>
                        </div>
                        <!--<div class="col-33">
                            <a href="#" class="button-header mt-15">
                                <span>
                                    <span class="icon-users-plus"></span>
                                </span>
                            </a>
                        </div>-->
                    </div>
    
                    <div class="row follow mt-10">
                        <div class="col-100 tablet-50 mb-5">
                            <div class="followers">
                                <span></span>
                                <span>{{(isset($displayName) ? $displayName : "Emlido User" )}}</span>
                            </div>
                        </div>
                        <!--<div class="col-50 tablet-50">
                            <div class="following">
                                <span>Following</span>
                                <span>33</span>
                            </div>
                        </div>-->
                    </div>
    
                    <div class="balance">
                        <p>Granville 2161 NSW</p>
                        <span class="rating blog-rating">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </span>
                        
                    </div>
                    
                    <svg viewBox="0 0 629 63" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Splash" transform="translate(-60.000000, -749.000000)" fill="#FFFFFF">
                                <g id="flaga">
                                    <path d="M60.7617187,750.025391 L375.435547,811.568359 L688.558594,749.867188 L60.7617187,750.025391 Z" id="Path-30"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
    
                <article>
                    
                    <div class="buttons">
                        <!--<a href="#"><span class="icon-bubble-dots"></span></a>-->
                        <a href="#"><span class="icon-heart"></span></a>
                    </div>
                    <div class="text">
                        <h2>
                            Lorem ipsum dolor sit amet
                        </h2>
                        <span>300 likes</span>
                        <!--<span>23 comments</span>
                        <span>14 000 views</span>-->
                    </div>
                    <img class="article-bg" src="assets/img/tmp/temp_1.png" alt=""/>
                </article>
    
                <article>
                    
                    <div class="buttons">
                        <!--<a href="#"><span class="icon-bubble-dots"></span></a>-->
                        <a href="#"><span class="icon-heart"></span></a>
                    </div>
                    <div class="text">
                        <h2>
                            Lorem ipsum dolor sit amet
                        </h2>
                        <span>300 likes</span>
                        <!--<span>23 comments</span>
                        <span>14 000 views</span>-->
                    </div>
                    <img class="article-bg" src="assets/img/tmp/temp_2.png" alt=""/>
                </article>
    
                <article>
                    
                    <div class="buttons">
                        <!--<a href="#"><span class="icon-bubble-dots"></span></a>-->
                        <a href="#"><span class="icon-heart"></span></a>
                    </div>
                    <div class="text">
                        <h2>
                            Lorem ipsum dolor sit amet
                        </h2>
                        <span>300 likes</span>
                        <!--<span>23 comments</span>
                        <span>14 000 views</span>-->
                    </div>
                    <img class="article-bg" src="assets/img/tmp/temp_3.png" alt=""/>
                </article>
                
                <article>
                    
                    <div class="buttons">
                        <!--<a href="#"><span class="icon-bubble-dots"></span></a>-->
                        <a href="#"><span class="icon-heart"></span></a>
                    </div>
                    <div class="text">
                        <h2>
                            Lorem ipsum dolor sit amet
                        </h2>
                        <span>300 likes</span>
                        <!--<span>23 comments</span>
                        <span>14 000 views</span>-->
                    </div>
                    <img class="article-bg" src="assets/img/tmp/temp_4.png" alt=""/>
                </article>
                
                <article>
                    
                    <div class="buttons">
                        <!--<a href="#"><span class="icon-bubble-dots"></span></a>-->
                        <a href="#"><span class="icon-heart"></span></a>
                    </div>
                    <div class="text">
                        <h2>
                            Lorem ipsum dolor sit amet
                        </h2>
                        <span>300 likes</span>
                        <!--<span>23 comments</span>
                        <span>14 000 views</span>-->
                    </div>
                    <img class="article-bg" src="assets/img/tmp/temp_5.png" alt=""/>
                </article>
                
            </div>

    </div>
</div>

</div>

@stop