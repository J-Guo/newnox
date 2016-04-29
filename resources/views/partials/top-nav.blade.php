<!-- Top Navigation Bar -->
@if($active == 1)
<div class="navbar" style="height:60px">
    <div class="row no-gutter">

        <div class="toolbar-inner">
            <div class="toolbar-inner">
                <a href="{{url('main')}}" class="tab-link link left active">
                    <i class="fa fa-home fa-2" style="font-size: 30px;  text-align: center"></i>
                </a>

                <a href="{{url('mydate')}}" class="tab-link link">
                    <i class="fa fa-heartbeat fa-2" style="font-size: 30px; opacity: .6"></i>
                </a>

                <a href="{{url('reviews')}}" class="tab-link link">
                    <i class="fa fa-star-o fa-2" style="font-size: 30px;  opacity: .6"></i>
                </a>
                <a href="{{url('profile/edit')}}" class="tab-link link right">
                    <i class="fa fa-user fa-4x"  style="font-size: xx-large; opacity: .6" ></i>

                </a>
            </div>
        </div>
    </div>
</div>
@elseif($active == 2)
    <div class="navbar" style="height:60px">
        <div class="row no-gutter">

            <div class="toolbar-inner">
                <div class="toolbar-inner">
                    <a href="{{url('main')}}" class="tab-link link left active">
                        <i class="fa fa-home fa-2" style="font-size: 30px; opacity: .6; text-align: center"></i>
                    </a>

                    <a href="{{url('mydate')}}" class="tab-link link">
                        <i class="fa fa-heartbeat fa-2" style="font-size: 30px; "></i>
                    </a>

                    <a href="{{url('reviews')}}" class="tab-link link">
                        <i class="fa fa-star-o fa-2" style="font-size: 30px;  opacity: .6"></i>
                    </a>
                    <a href="{{url('profile/edit')}}" class="tab-link link right">
                        <i class="fa fa-user fa-4x"  style="font-size: xx-large; opacity: .6" ></i>

                    </a>
                </div>
            </div>
        </div>
    </div>
@elseif($active == 3)
    <div class="navbar" style="height:60px">
        <div class="row no-gutter">

            <div class="toolbar-inner">
                <div class="toolbar-inner">
                    <a href="{{url('main')}}" class="tab-link link left active">
                        <i class="fa fa-home fa-2" style="font-size: 30px; opacity: .6; text-align: center"></i>
                    </a>

                    <a href="{{url('mydate')}}" class="tab-link link">
                        <i class="fa fa-heartbeat fa-2" style="font-size: 30px; opacity: .6 "></i>
                    </a>

                    <a href="{{url('reviews')}}" class="tab-link link">
                        <i class="fa fa-star-o fa-2" style="font-size: 30px;  "></i>
                    </a>
                    <a href="{{url('profile/edit')}}" class="tab-link link right">
                        <i class="fa fa-user fa-4x"  style="font-size: xx-large; opacity: .6 " ></i>

                    </a>
                </div>
            </div>
        </div>
    </div>
@elseif($active == 4)
    <div class="navbar" style="height:60px">
        <div class="row no-gutter">

            <div class="toolbar-inner">
                <div class="toolbar-inner">
                    <a href="{{url('main')}}" class="tab-link link left active">
                        <i class="fa fa-home fa-2" style="font-size: 30px; opacity: .6; text-align: center"></i>
                    </a>

                    <a href="{{url('mydate')}}" class="tab-link link">
                        <i class="fa fa-heartbeat fa-2" style="font-size: 30px; opacity: .6 "></i>
                    </a>

                    <a href="{{url('reviews')}}" class="tab-link link">
                        <i class="fa fa-star-o fa-2" style="font-size: 30px;  opacity: .6"></i>
                    </a>
                    <a href="{{url('profile/edit')}}" class="tab-link link right">
                        <i class="fa fa-user fa-4x"  style="font-size: xx-large; " ></i>

                    </a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="navbar" style="height:60px">
        <div class="row no-gutter">

            <div class="toolbar-inner">
                <div class="toolbar-inner">
                    <a href="{{url('main')}}" class="tab-link link left active">
                        <i class="fa fa-home fa-2" style="font-size: 30px; opacity: .6; text-align: center"></i>
                    </a>

                    <a href="{{url('mydate')}}" class="tab-link link">
                        <i class="fa fa-heartbeat fa-2" style="font-size: 30px; opacity: .6 "></i>
                    </a>

                    <a href="{{url('reviews')}}" class="tab-link link">
                        <i class="fa fa-star-o fa-2" style="font-size: 30px;  opacity: .6"></i>
                    </a>
                    <a href="{{url('profile/edit')}}" class="tab-link link right">
                        <i class="fa fa-user fa-4x"  style="font-size: xx-large; opacity: .6 " ></i>

                    </a>
                </div>
            </div>
        </div>
    </div>
@endif