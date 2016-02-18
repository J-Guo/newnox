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
			<form name="form" action="reg-profile" method="post">
            <div class="login-view-box mt-50">

                <div class="list login-form-box">
                	<div class="content-block-title text-center"><label>Please input your 4 digit password</label></div>
                	
                    <div class="row text-center mt-20 mb-20">
                        <div class="col-one-four">
                            <input type="text" class="inputs-single" maxlength="1"/> 
                            
                        </div>
                        <div class="col-one-four">
                            <input type="text" class="inputs-single" maxlength="1"/> 
                            
                        </div>
                        <div class="col-one-four">
                            
                            <input type="text" class="inputs-single" maxlength="1"/> 
                        </div>
                        <div class="col-one-four">
                            
                            <input type="text" class="inputs-single" maxlength="1"/> 
                        </div>
                    </div>
                </div>
            </div>

			<div class="login-view-box mt-50">

                <div class="list login-form-box">
                	<div class="item-inner">
                        <div class="row text-center ml-10 mr-10 mt-20 mb-20">
                            <input type="submit" class="button button-primary" name="submit" value="Find a pay date" />
                        </div>
                   	</div>
                </div>
            </div>
			</form>
        </div>

    </div>
</div>


@stop