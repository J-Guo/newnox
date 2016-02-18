@extends('layouts.login-layout')

@section('content') 
<div class="pages navbar-fixed toolbar-fixed">
    <div data-page="login" class="page">

        <div class="page-content">

            <div class="nice-header header-fix-top small">
                <div class="logo">
                    <h1>EMLIDO</h1> 
                </div>
              <svg class="anim-svg" viewBox="0 0 629 80" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Splash" sketch:type="MSArtboardGroup" transform="translate(-60.000000, -749.000000)" fill="#FFFFFF">
                            <g id="flaga" sketch:type="MSLayerGroup">
                                <path d="M60.7617187,750.025391 L375.435547,811.568359 L688.558594,749.867188 L60.7617187,750.025391 Z" id="Path-30" sketch:type="MSShapeGroup"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

            <div class="login-view-box mt-50">

                
                <div class="card card-header-pic">                    
                    <div class="card-content">
                        <div class="card-content-inner">
                            <h4 class="text-center">Select an age range</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="item-input">
                            
                        </div>                        
                    </div>
                </div>
                
                <div class="card card-header-pic">                    
                    <div class="card-content">
                        <div class="card-content-inner">
                            <h4 class="text-center">Select your partner</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                    
                    <div class="row">

                        <div class="col-50">
                   
                            <div class="card-content-inner">
                                <input type="radio" name="gender" />
                                        <h4 class="title mt-5 mb-0">Male</h4>
                                        
                                </a>
                            </div>
                               
                        </div>
    
                        <div class="col-50">

                            <div class="card-content-inner">
                                <input type="radio" name="gender" checked="checked" />
                                    <h4 class="title mt-5 mb-0">Female</h4>
                                </a>
                            </div>
                               
                        </div>
                        <!--<div class="row">
                        	<div class="col-50">
                            	<input type="radio" name="gender" /><label>Male</label>
                            </div>
                            
                            <div class="col-50">
                            	<input type="radio" name="gender" checked="checked" /><label>female</label>
                            </div>
                            
                        </div>-->
                  </div>
                </div>
                
                
            </div>

        </div>

    </div>
</div>


@stop