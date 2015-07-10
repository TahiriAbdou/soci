@extends('app',['links'=>[['title'=>'Projects','url'=>'http://whatever.com']],'h'=>'Choose your theme'])
@section('content')
<div class="row">
    <div class="col-lg-4 animated tada">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Basic Theme</h5>
            </div>
            <div class="ibox-content">
                <a href="{!! url('projects/make/simple') !!}" class="x-large-img">
                    <img src="/screen-shots/simple.png" class="img-responsive" alt="" />
                </a>
            </div>
        </div>              
    </div>
    <div class="col-lg-4 animated tada">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Countdown</h5>
            </div>
            <div class="ibox-content">
                <a href="{!! url('projects/make/countdown') !!}" class="x-large-img">
                    <img src="/screen-shots/countdown.png" class="img-responsive" alt="" />
                </a>
            </div>
        </div>              
    </div>
    <div class="col-lg-4 animated tada">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Optin</h5>
            </div>
            <div class="ibox-content">
                <a href="{!! url('projects/make/optin') !!}" class="x-large-img">
                    <img src="/screen-shots/optin.png" class="img-responsive" alt="" />
                </a>
            </div>
        </div>              
    </div>
    <div class="hidden">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Paypal</h5>
                </div>
                <div class="ibox-content">
                    <a href="#" class="x-large-img">
                        <img src="http://lorempixel.com/601/450" class="img-responsive" alt="" />
                    </a>
                    <br />
                    <p class="text-info text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt.</p>
                </div>
            </div>              
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>JVZOO</h5>
                </div>
                <div class="ibox-content">
                    <a href="#" class="x-large-img">
                        <img src="http://lorempixel.com/602/451" class="img-responsive" alt="" />
                    </a>
                    <br />
                    <p class="text-info text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt.</p>
                </div>
            </div>              
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> <i class="fa fa-amazon"></i> Amazon</h5>
                </div>
                <div class="ibox-content">
                    <a href="#" class="x-large-img">
                        <img src="http://lorempixel.com/600/450" class="img-responsive" alt="" />
                    </a>
                    <br />
                    <p class="text-info text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt.</p>
                </div>
            </div>              
        </div>
    </div>

</div>
@stop