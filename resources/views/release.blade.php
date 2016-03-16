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
                <div class="center sliding">Release Payment</div>
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
                <form name="form" action="{{url('release-payment')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="offerID" value="{{$offer->id}}">
                    <div class="page-content">

                        <div class="card">

                            <div class="card-content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="item-content">
                                            <div class="item-media">
                                                <div class="row">
                                                    <div class="col-100 mt-15">
                                                        <img src="{{url('avatars/'.$offer->sender->profile_photo)}}" width="105">


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-inner">
                                                <div class="item-subtitle"><h3><strong>
                                                        {{$offer->sender->display_name}}</strong></h3></div>
                                                <div class="item-subtitle"><p>Price: <strong>$
                                                        {{$offer->price}}</strong></p></div>
                                                <div class="item-subtitle"><p>Date:
                                                        {{$offer->date}}</p></div>
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

                        <div class="content-block">
                            <div class="input-submit">
                               <input type="submit" class="button button-primary button-fill" value="Release Payment">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@stop