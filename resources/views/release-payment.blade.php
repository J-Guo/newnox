@extends('layouts.main-layout')

@section('content')

    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding">Release Payment List</div>
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
            <div class="page-content">
                <!-- show dates nearby-->



                <div class="card">
                <form name="releaseForm" action="{{url('release-payment/1')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <div class="row">
                                            <div class="col-100">
                                                <img src="{{url('avatars/default2.jpg')}}"
                                                     height="100"  width="100">

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

                                        <div class="item-subtitle"><p>Price: <strong>$220</strong></p></div>
                                        <div class="item-subtitle"><p>Date: 2016-03-15</p></div>
                                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                                        <div class="item-inner">
                                            <div class="row text-center">
                                                <input type="submit"  class="button button-primary button-small" name="release" value="Release Payment" />
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </form> <!-- End Release Payment Box -->
                </div>

            </div>
        </div>
    </div>
@stop