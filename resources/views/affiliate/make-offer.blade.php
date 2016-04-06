@extends('layouts.affiliate-layout')

@section('content')

    <!--Top Navigation Bar -->
    @include('layouts.top-nav',['title'=>'Make Offer'])

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
                            <input type="hidden" name="task_id" value="{{$posted_task->id}}">

                            <div class="form-row">
                                <label for="login"><span class="icon-cash-dollar"></span></label>
                                <input type="text" id="price" name="price" placeholder="{{$posted_task->price}}">
                            </div>
                            <div class="form-row">
                                <label for="date"><span class="icon-calendar-check"></span></label>
                                <input type="date" id="date" name="date" placeholder="Input Date"
                                       value="{{date('Y-m-d')}}">
                            </div>

                            <!-- Submit Button-->
                            <input type="submit" form="offerForm" class="button button-primary" value="Send An Offer" />
                        </form>

                        <!-- Show Input Errors Message-->
                        <div class="content-block">
                        @if (count($errors) > 0)
                            @foreach($errors->all() AS $error)
                                <div class="alert alert-info text-center">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>
@stop

