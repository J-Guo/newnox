@extends('layouts.affiliate-layout')

@section('content')
    <div class="view another-view">

        <div class="navbar">
            <div class="navbar-inner">
                <div class="left">
                    <a href="#" class="link icon-only open-panel">
                        <span class="kkicon icon-menu"></span>
                    </a>
                </div>
                <div class="center sliding">Profile</div>
                <div class="right">
                    <a href="#" class="link icon-only open-panel" data-panel="right">
                        <span class="kkicon icon-alarm"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pages -->
        <div class="pages navbar-fixed toolbar-fixed ">
            <div data-page="dashboard-1" class="page ">
                <div class="page-content">

                    <div class="nice-header header-fix-top">

                        <div class="ava-box row">
                            <div class="col-100">
                                <img src="{{ isset($imageURL) ? url("avatars/".$imageURL) :url("avatars/default.jpg")}}"
                                     class="ava" alt=""/>
                            </div>
                        </div>

                        <div class="row follow mt-10">
                            <div class="col-100 tablet-50 mb-5">
                                <div class="followers">
                                    <span></span>
                                    <span>{{(isset($displayName) ? $displayName : "Emlido User" )}}</span>
                                </div>
                            </div>

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