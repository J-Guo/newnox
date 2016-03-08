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
            <div class="center sliding">Create Profile</div>
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
                <!-- Form to submit user profile information including image upload-->
            	<form id="reg-form" action="{{url('profile/create')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="content-block-title">Basic profile details of you.</div>
                    <div class="list-block">
                    	
                        <ul>
                            <!-- Text inputs -->
                            <li>
                                <div class="item-content">
                                    <div class="item-media"><span class="icon-profile"></span></div>
                                    <div class="item-inner">
                                        <div class="item-title label">Name</div>
                                        <div class="item-input">
                                          <input type="text" name="displayName" placeholder="Display Name" required />
                                        </div>
                                    </div>
                                </div>
                            </li>
                                                        
                            <li>
                                <div class="item-content">
                                    <div class="item-media"><span class="icon-man-woman"></span></div>
                                    <div class="item-inner">
                                        <div class="item-title label">Gender</div>
                                        <div class="item-input">
                                            <select name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- Age -->
                            <li>
                                <div class="item-content">
                                    <div class="item-media"><span class="icon-cake"></span></div>
                                    <div class="item-inner">
                                        <div class="item-title label">Age</div>
                                        <div class="item-input">
                                            <select name="age">
                                                @for ($i = 18; $i <= 75; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- Profie Photo -->
                            <li class="mt-10">
                                <div class="item-content">
                                    <div class="item-media"><span class="icon-picture"></span></div>
                                    <div class="item-inner">
                                        <div class="item-title label">Profile pic</div>
                                        <div class="item-input">
                                              <div class="uploadFile timelineUploadBG">
                                                <input type="file" id="avatar" name="avatar" accept='image/*' class="custom-file-input" required />
                                              </div>
                                        </div>
                                        <img src="{{url("avatars/default.jpg")}}" id="avatar-preview" height="75px" width="75px" alt="image"/>
                                    </div>
                                </div>
                            </li>                        
                        </ul>
                    </div>
                    
                    
                    <div class="login-view-box mt-50">
    
                    <div class="list login-form-box col-33">
                        
                        <div class="item-inner">
                            <div class="row text-center ml-10 mr-10 mt-20 mb-20">
                                <input type="submit" class="button button-primary" id="submitButton" value="Save Your Details" />
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

@section('footer')
<!-- Parsley Form Validator-->
<script src="{{ asset('assets/js/pages/parsley.min.js')}}"></script>
<!--Scripts for image upload preview -->
<script>
    $('document').ready(function(){

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#avatar").change(function () {
            readURL(this);
        });

        //set validation for reg-form
        $("#reg-form").parsley();

    });

</script>
@stop