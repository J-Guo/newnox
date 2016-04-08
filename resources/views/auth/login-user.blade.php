@extends('layouts.login-layout')

@section('content')

<div class="pages navbar-fixed">
    <div data-page="login" class="page">

        <div class="page-content">

            <div class="nice-header header-fix-top small">
                <div class="logo">
                    <h1>EMLIDO</h1>
                </div>
              <svg class="anim-svg" viewBox="0 0 629 80" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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

            <div class="login-view-box mt-50">

                <div class="list login-form-box">
                    <form class="form nice-label" id="phone-form" action="otp" method="POST">
                        {{csrf_field()}}

                        <div class="form-row">
                            <input type="tel" class="inputs" align="middle" id="mobileNum" name="mobileNum" placeholder="MOBILE NUMBER" data-parsley-type="digits" autocomplete="off">
                        </div>
                        <!-- Determine usre type -->
                        <input type="hidden" id="userType" name="userType" value="user">

                        <!-- Show Authentication Failed Information-->
                        @if(session()->has('message') )
                            <div class="content-block-title text-center">
                                <span class="color-blue">{{ session()->get('message') }}</span>
                            </div>
                        @endif

						<div class="list mt-20 mb-20"></div>
                        <div class="buttons-row">
                            {{--<input type="submit" id="userSubmit" class="button button-primary" value="Find a date">--}}
                            <button type="submit" name="userSubmit" class="button button-primary" value="user">Find a date</button>

                            {{--<input type="submit" id="affiliateSubmit" class="button button-primary" value="Affilate Login">--}}
                            <button type="submit" name="userSubmit" class="button button-primary" value="affiliate">Become Affiliate</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>
</div>

@stop

@section('footer')
    <script>
        $(document).ready(function() {

            //set user type based on submit button
            $('#affiliateSubmit').on("click",function(){
                $('#userType').val('affiliate');
            });

        });
        validationLength = 10;
        $('#mobileNum').on('keyup change', function () {
            if ($(this).val().length == validationLength) {
                if($.isNumeric($(this).val())){
                    document.activeElement.blur();
                }
            }
        });
    </script>

<script src="{{ asset('assets/js/pages/custom.js')}}"></script>
<script src="{{ asset('assets/js/pages/validation.js')}}"></script>
@stop
