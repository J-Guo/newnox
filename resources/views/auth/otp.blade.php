@extends('layouts.login-layout')

@section('header')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
    </style>
@stop

@section('content') 
<div class="pages navbar-fixed toolbar-fixed">
    <div data-page="login" class="page">

        <div class="page-content">

            <div class="nice-header header-fix-top small">
                <div class="logo">
                    <h1>EMLIDO</h1> 
                </div>
              <svg class="anim-svg" viewBox="0 0 629 80" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
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

            <form name="form" action="verify" method="post" id="token-form">
            <div class="login-view-box mt-50">

                {{csrf_field()}}
                <input name="userid" type="hidden" value="{{(isset($userid) ? $userid : old('userid') )}}" />
                <input name="mobileNum" type="hidden" value="{{(isset($mobileNum) ? $mobileNum : old('mobileNum') )}}" />
                <input name="userType" type="hidden" value="{{(isset($userType) ? $userType : old('userType') )}}" />

                <div class="row text-center mt-20 mb-20">
                    <div class="col-one-four">
                        <input type="tel" id="digit1" name="digit[1]" class="form-control inputs-single" maxlength="1" onKeyUp="moveCursorBack(this.value, 2);" oninput="checkLength(1)"/>
                    </div>
                    <div class="col-one-four">
                        <input type="tel" id="digit2" name="digit[2]" class="form-control inputs-single" maxlength="1" onKeyUp="moveCursorBack(this.value, 3);" oninput="checkLength(2)"/>

                    </div>
                    <div class="col-one-four">

                        <input type="tel" id="digit3" name="digit[3]" class="form-control inputs-single" maxlength="1" onKeyUp="moveCursorBack(this.value, 4);" oninput="checkLength(3)"/>
                    </div>
                    <div class="col-one-four">

                        <input type="tel" id="digit4" name="digit[4]" class="form-control inputs-single" maxlength="1" onKeyUp="moveCursorBack(this.value);" oninput="checkLength(4)"/>
                    </div>
                </div>
            </div>
                <!-- Show Authentication Failed Information-->
                @if(session()->has('message') )
                    <div class="alert alert-info text-center">
                        <strong>Login Failed!:</strong>
                        <span>{{ session()->get('message') }}</span>
                    </div>
                @endif

			<div class="login-view-box mt-50">

                <div class="list login-form-box">
                	<div class="item-inner">
                        <div class="row text-center ml-10 mr-10 mt-20 mb-20">
                            <input type="submit" class="button button-primary" name="submit" value="Find a pay date" />
                        </div>
                   	</div>
                </div>
            </div>
			</form>
        </div>

    </div>
</div>


@stop

@section('footer')
    <script type="text/javascript">

        $(document).ready(function () {
            //called when key is pressed in textbox
            $("#digit1").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    return false;
                }
            });
            $("#digit2").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    return false;
                }
            });
            $("#digit3").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    return false;
                }
            });
            $("#digit4").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });


        });

        function checkLength(key)
        {
            var fieldLength = document.getElementById('digit' + key + '').value.length;
            if (fieldLength <= 1) {
                return true;
            }
            else
            {
                var str = document.getElementById('digit' + key + '').value;
                str = str.substring(0, str.length - 1);
                document.getElementById('digit' + key + '').value = str;
            }
        }

        function moveCursorBack(input, key) {

            if (input.length > 0) {
                if (input != '') {

                    $("#digit" + key).focus();
                    $("#digit" + key).focus();
                }
            }
        }
        $(document).ready(function () {
            $(':input').keyup(function (e) {
                if ((e.which == 8 || e.which == 46) && $(this).val() == '') {
                    $(this).prev('input').focus();
                }
            });
        });

        validationLength = 1;
        $('#digit4').on('keyup change', function () {
            var otp_1 = $('#digit1').val().length;
            var otp_2 = $('#digit2').val().length;
            var otp_3 = $('#digit3').val().length;
            var otp_4 = $('#digit4').val().length;

            if (otp_1 == validationLength && otp_2 == validationLength && otp_3 == validationLength && otp_4 == validationLength) {
                if ($.isNumeric(otp_1) && $.isNumeric(otp_2) && $.isNumeric(otp_3) && $.isNumeric(otp_4)) {
                    document.activeElement.blur();
                }
            }

        });


        /*validationLength = 1;
         $('#digit' + key).on('keyup change', function () {
         alert("I am an alert box!");
         if ($(this).val().length == validationLength) {
         if($.isNumeric($(this).val())){
         document.activeElement.blur();
         }
         }
         });*/

    </script>
@stop
