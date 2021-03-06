@extends('layouts.affiliate-layout')

@section('content')

    <!--Top Navigation Bar -->
    @include('layouts.top-nav',['title'=>'Bank Detail'])

    <!-- Notification -->
    <div class="pages navbar-fixed toolbar-fixed ">

        <div data-page="notifications" class="page page-on-left">

            <div class="page-content">

                <div class="content-block">
                    <p>
                        With Notifications component you can show required messages that looks like Push (or Local) iOS notifications.
                    </p>
                </div>

                <div class="content-block">
                    <p><a href="#" class="button button-secondary button-fill notification-default">Default notification</a></p>
                    <p><a href="#" class="button button-secondary button-fill notification-full">Full-layout notification</a></p>
                    <p><a href="#" class="button button-secondary button-fill notification-custom">With custom image</a></p>
                    <p><a href="#" class="button button-secondary button-fill notification-callback">With callback on close</a></p>
                </div>

            </div>
        </div>

        <!-- Affiliate Bank Detail -->
        <div class="page no-toolbar page-on-center">
            <div class="page-content">
            <!-- Show Input Validation Errors Message-->
            @if (count($errors) > 0)
                @foreach($errors->all() AS $error)
                    <div class="alert alert-info text-center">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <div class="login-view-box mt-50">

            <div class="list login-form-box">
                <form class="form nice-label" id="affiliateDetail" action="{{url('bank-detail/create')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-row">
                        <label for="name"><span class="icon-woman"></span></label>
                        <input type="text" name="userName" id="name" placeholder="Your Name">
                    </div>
                    <div class="form-row">
                        <label for="bankName"><span class="icon-home2"></span></label>
                        <input type="text" name="bankName" id="bankName" placeholder="Bank Name">
                    </div>
                    <div class="form-row">
                        <label for="bsb"><span class="icon-bag-dollar"></span></label>
                        <input type="tel" name="bsbNo" id="bsbNo" placeholder="BSB">
                    </div>
                    <div class="form-row">
                        <label for="email"><span class="icon-at-sign"></span></label>
                        <input type="tel" name="accountNo" id="accountNo" placeholder="Account No.">
                    </div>

                    <!-- Submit Button-->
                    <input type="submit" form="affiliateDetail" class="button button-primary" value="Submit">

                </form>
            </div>
            </div>
            </div>
         </div>

    </div>


@stop