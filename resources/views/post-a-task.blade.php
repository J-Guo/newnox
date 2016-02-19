<?php
date_default_timezone_set("Australia/Sydney");
$today = date("d/m/Y");

?>

<link href="../../public/assets/themes/red/style.css" rel="stylesheet" type="text/css" />
@extends('layouts.main-layout')

@section("header")
    <link rel="stylesheet" href="{{asset('assets/css/map6.css')}}">
@stop

@section('content') 
<div class="view another-view">

    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding">post a task</div>
            <div class="right">
                <a href="#" class="link icon-only open-panel" data-panel="right">
                    <span class="kkicon icon-alarm"></span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Pages -->
    <div class="pages navbar-fixed toolbar-fixed ">
        <div class="page" data-page="settings">
            <div class="page-content">
            	<div class="content-block-title mb-20 text-center">search affiliate for your dates</div>
                <div class="card card-header-map">
                    
                    <div class="card-content">
                        <div class="card-content-inner contact-type-list">
                            <form @submit.prevent="locateAddress" id="locationForm">
                                <input type="text" id="address" v-model="address" placeholder="123 Example St">
                                <button type="submit" class="">Search</button>
                            </form>

                            <div  id="User-Map"></div>
                        </div>
                    </div>
                </div>
                <form name="form1" action="date-near-by" method="post">
                    {{csrf_field()}}
                    <div class="card card-header-map">
                        
                        <div class="card-content">
                            
    
                            <div class="card-content-inner contact-type-list">
                                <div class="list-block">
                                    <ul>
                                        <!-- Text inputs -->
                                        <li>
                                            <div class="item-content">
                                                <div class="item-inner">
                                                    <div class="item-title label">Wish a Date :</div>
                                                    <div class="item-inputa">
                                                        <input type="date" placeholder="Birth day" value="2016-02-17">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="card card-header-map">
                        
                        <div class="card-content">
                            <div class="card-content-inner contact-type-list">
                                
                                <div class="text-center mb-25">
                                    Select a price range
                                </div>
    
                                
                                <div class="list-block">
                                    <ul>
                                        <!-- Text inputs -->
                                        <li>
                                            <div class="item-content">
                                                <div class="item-inner">
                                                    
                                                    <div class="item-input mb-15">
                                                        <div class=" dark range-slider">
                                                            <input type="range" min="0" max="100" value="50" step="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="list login-form-box col-33">
                            
                        <div class="item-inner">
                            <div class="row text-center ml-10 mr-10 mt-20 mb-20">
                                <input type="submit" class="button button-primary" name="submit" value="Search Date Nearby" />
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>

	<!--@include('layouts.emlida-footer')-->

</div>


@stop

@section("footer")

<!--Build Vue.js -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.14/vue.min.js"></script>
<!--Build Loading Overlay -->
<script type="text/javascript" src="{{asset('assets/js/loadingoverlay.js')}}"></script>
<!--Build Local JavaScripts -->
<script src="{{asset('assets/js/map6.js')}}"></script>
<!--Build Google Map API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAomTWe6-_JXMoza7hm9olIQLZ8TEq5PdY&callback=app.createMap"
        async defer></script>
@stop

