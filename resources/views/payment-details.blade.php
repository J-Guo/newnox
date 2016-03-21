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
            <div class="center sliding">Payment Information</div>
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
            	<form name="reg-form" action="assigned-date" method="post">
                    {{csrf_field()}}

                    <div class="list-block">
                    	
                        <ul>
                            <!-- Text inputs -->
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">Name On Card</div>
                                        <div class="item-input">
                                          <input type="text" placeholder="As in card" value="John Maria">
                                        </div>
                                    </div>
                                </div>
                            </li>
                                                        
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">Card Number</div>
                                        <div class="item-input">
                                          <input type="text" placeholder="16 Digit Number" value="12xx xxxx xxxx xx87">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- CSV -->
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">CVC</div>
                                        <div class="item-input">
                                          <input type="text" placeholder="Secutiry Number" value="XXX">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- Date -->
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">Expired on</div>
                                        <div class="item-input col-33">
                                          <input type="text" placeholder="Month(mm)" />
                                        </div>
                                        <div class="item-input col-33">
                                          <input type="text" placeholder="Year(yy)" />
                                        </div>
                                    </div>
                                </div>
                            </li>                       
                        </ul>
                    </div>
                    
                    
                    <div class="login-view-box mt-50">
    
                    <div class="list login-form-box col-33">
                        
                        <div class="item-inner">
                            <div class="row text-center ml-10 mr-10 mt-20 mb-20">
                                <input type="submit" class="button button-primary" name="submit" value="Confirm Payment" />
                            </div>
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

