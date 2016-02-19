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
                {{csrf_field()}}
            <div class="page-content">

                <div class="card">
                  
                  <div class="card-content">
                    <div class="list-block media-list">
                      <ul>
                        <li class="item-content">
                          <div class="item-media">
                            <div class="row">
                            	<div class="col-100">
	                            	<img src="images/Untitled.jpg" width="100">
                            
                                
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

                            <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                            <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                            <div class="item-inner">
                                <div class="row text-center">
                                    <input type="submit" class="button button-primary button-small" name="confirm" value="Confirm Booking" />
                                </div>
                            </div>
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
                          <div class="item-media">
                            <div class="row">
                            	<div class="col-100">
	                            	<img src="images/Untitled.jpg" width="100">
                            
                                
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                </div>
                            </div>
                          </div>
                          <div class="item-inner">

                            <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                            <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                            <div class="item-inner">
                                <div class="row text-center">
                                    <input type="submit" class="button button-primary button-small" name="confirm" value="Confirm Booking" />
                                </div>
                            </div>
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
                          <div class="item-media">
                            <div class="row">
                            	<div class="col-100">
	                            	<img src="images/Untitled.jpg" width="100">
                            
                                
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                </div>
                            </div>
                          </div>
                          <div class="item-inner">

                            <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                            <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                            <div class="item-inner">
                                <div class="row text-center">
                                    <input type="submit" class="button button-primary button-small" name="confirm" value="Confirm Booking" />
                                </div>
                            </div>
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
                          <div class="item-media">
                            <div class="row">
                            	<div class="col-100">
	                            	<img src="images/Untitled.jpg" width="100">
                            
                                
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                </div>
                            </div>
                          </div>
                          <div class="item-inner">

                            <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                            <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                            <div class="item-inner">
                                <div class="row text-center">
                                    <input type="submit" class="button button-primary button-small" name="confirm" value="Confirm Booking" />
                                </div>
                            </div>
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
                          <div class="item-media">
                            <div class="row">
                            	<div class="col-100">
	                            	<img src="images/Untitled.jpg" width="100">
                            
                                
                                    <span class="rating blog-rating small">
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star" style="color:#F90;"></span>
                                        <span class="icon-star"></span>
                                    </span>
                                </div>
                            </div>
                          </div>
                          <div class="item-inner">

                            <div class="item-subtitle"><p>Price: <strong>$250</strong></p></div>
                            <div class="item-subtitle"><p>Date: 22/02/2017</p></div>
                            <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                            <div class="item-inner">
                                <div class="row text-center">
                                    <input type="submit" class="button button-primary button-small" name="confirm" value="Confirm Booking" />
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