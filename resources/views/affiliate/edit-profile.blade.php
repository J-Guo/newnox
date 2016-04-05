@extends('layouts.affiliate-layout')

@section('content')
    <div class="view another-view">

        <!--Top Navigation Bar -->
        @include('layouts.top-nav',['title'=>'Edit Profile'])

        <!-- Pages -->
        <div class="pages navbar-fixed toolbar-fixed ">
            <div class="page" data-page="settings">
                <div class="page-content">

                    <!-- Show Updated Information-->
                    @if(session()->has('message') )
                        <div class="alert alert-info text-center">
                            <strong>Information!</strong>
                            <span>{{ session()->get('message') }}</span>
                        </div>
                        @endif

                                <!-- Form to submit user profile edit information including image upload-->
                        <form id="reg-form" action="{{url('aprofile/edit')}}" enctype="multipart/form-data" method="post">
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
                                                    <input type="text" name="displayName"
                                                           placeholder="Display Name"
                                                           value="{{isset($user) ? $user->display_name :''}}" required>
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
                                                    <!--Generate Gender Based on User -->
                                                    {{ Form::select('gender', [
                                                           'male' => 'Male',
                                                           'female' => 'Female'],
                                                          isset($user) ? $user->gender :'male'
                                                    ) }}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Preference-->
                                    <li>
                                        <div class="item-content">
                                            <div class="item-media"><span class="icon-link"></span></div>
                                            <div class="item-inner">
                                                <div class="item-title label">Preference</div>
                                                <div class="item-input">
                                                    <!--Generate Preference Based on User -->
                                                    {{ Form::select('preference', [
                                                           'male' => 'Male',
                                                           'female' => 'Female',
                                                           'both' => 'Both'],
                                                          isset($user) ? $user->preference :'female'
                                                    ) }}
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
                                                    {{Form::selectRange('age',
                                                     18,
                                                     75,
                                                     isset($user) ? $user->age :18)
                                                     }}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-content">
                                            <div class="item-media"><span class="icon-papers"></span></div>
                                            <div class="item-inner">
                                                <div class="item-title label">Public Profile</div>
                                                <div class="item-input">
                                                    <!--Generate Public Profile Based on User -->
                                                    {{ Form::select('public_profile', [
                                                           1 => 'Yes',
                                                           0 => 'No'],
                                                          isset($user) ? $user->public_profile :1
                                                    ) }}
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
                                                        <input type="file" id="avatar" name="avatar"
                                                               accept='image/x-png, image/jpeg' class="custom-file-input" required>
                                                    </div>
                                                </div>
                                                <img src="{{ isset($user) ? url("avatars/".$user->profile_photo) :url("avatars/default.jpg")}}"
                                                     id="avatar-preview" height="75px" width="75px" alt="image"/>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                            <div class="login-view-box mt-50">

                                <div class="list login-form-box col-33">

                                    <div class="item-inner">
                                        <div class="row text-center ml-10 mr-10 mt-20 mb-20">
                                            <input type="submit" class="button button-primary" id="submitButton" value="Submit Changes" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
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