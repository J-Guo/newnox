@extends('layouts.affiliate-layout')

@section('content')

    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="#" class="link icon-only open-panel">
                    <span class="kkicon icon-menu"></span>
                </a>
            </div>
            <div class="center sliding" style="left: 0px;">Send An Offer</div>
            <div class="right">
                <a href="#" class="link icon-only open-panel" data-panel="right">
                    <span class="kkicon icon-alarm"></span>
                </a>
            </div>
        </div>
    </div>

    <div class="pages navbar-fixed toolbar-fixed">
        <div class="page no-toolbar" data-page="blog">
            <div class="page-content">

            <!-- Task Poster Information-->
            <div class="card">
                <div class="card-content">
                    <div class="list-block media-list">
                <ul>
                    <li class="item-content">
                      <div class="item-media">
                      <div class="row">
                           <div class="col-100">
                            <img src="{{ isset($task_poster) ? url("avatars/".$task_poster->profile_photo) :url("avatars/default.jpg")}}"
                                 height="100" width="100">

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
                        <!-- Output all values of each task -->
                        <input type="hidden" name="poster" value="" />
                        <div class="item-subtitle"><p>Price: <strong>${{isset($posted_task) ? $posted_task->price :''}}</strong></p></div>
                        <div class="item-subtitle"><p>Date: {{isset($posted_task) ? $posted_task->date :''}}</p></div>
                        <div class="item-subtitle"><p>Place: Sydney, Australia</p></div>
                     </div>
                   </li>
                </ul>
                    </div>
                </div>
            </div>

            <!-- Make Offer Form-->
                <div class="login-view-box mt-50">
                    <div class="list login-form-box">

                        <form  class="form nice-label" id="offerForm" action="{{url('send-offer')}}" method="POST">
                            {{csrf_field()}}

                            <div class="form-row">
                                <label for="login"><span class="icon-cash-dollar"></span></label>
                                <input type="text" id="login" placeholder="Price">
                            </div>
                            <div class="form-row">
                                <label for="date"><span class="icon-calendar-check"></span></label>
                                <input type="date" id="date" placeholder="Birth day"
                                       value="{{date('Y-m-d')}}">
                            </div>

                            <!-- Submit Button-->
                            <input type="submit" form="offerForm" class="button button-primary" value="Send An Offer" />
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@stop

