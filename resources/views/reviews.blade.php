<link href="../../public/assets/themes/red/style.css" rel="stylesheet" type="text/css" />
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
            <div class="center sliding">reviews</div>
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
                            <div class="row">
                            	<div class="col-100 mt-15">
	                            	<img src="images/maria.jpg" width="105">
                                    
                                    
                                </div>
                            </div>
                          </div>
                          <div class="item-inner">
							<div class="item-subtitle"><h3>Juleka Jeba</strong></h3></div>
                            <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                            <div class="item-subtitle"><span class="rating blog-rating">
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="width:20%"></span>
                                    </span></div>
                          </div>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
				</div>
                
                
                <div class="card">
                  
                  <div class="card-content">
                    <div class="list-block media-list">
                      <ul>
                        <li class="item-content">
                          
                          <div class="item-inner">
							
                            <div class="item-inner row">
                                <div class="col-66"><p>Give reviews here</p></div>
                            	<div class="col-33">
                                    <span class="rating blog-rating" style="text-align:center">
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="color:#F90; width:18%"></span>
                                        <span class="icon-star" style="width:20%"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="item-inner">
                                <div class="row text-center">
                                    <input type="submit" class="button button-primary button-small" name="confirm" value="Thanks your stars" />
                                </div>
                            </div>
                          </div>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
				</div>
                
                
                
            </div>
            </form>
        </div>
    </div>
</div>

@stop