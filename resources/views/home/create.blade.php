@extends('app',['links'=>[['title'=>'Test','url'=>'http://whatever.com']],'h'=>'Tableau de bord'])

@section('content')
	<div class="col-lg-12 clearfix">
		<div class="pull-left">
			<button class="btn btn-primary dim" type="button"><i class="fa fa-save"></i> Save Project</button>	
		</div>
		<div class="pull-right">
			<button class="btn btn-danger dim" type="button"><i class="fa fa-play"></i> Preview Video</button>
			<button class="btn btn-default dim" type="button"><i class="fa fa-share"></i> Embed Code</button>
			<button class="btn btn-success dim" type="button"><i class="fa fa-facebook"></i> Share on Facebook</button>
			<button class="btn btn-info dim" type="button"><i class="fa fa-twitter"></i> Share on Twitter</button>
		</div>
	</div>
	<div class="col-lg-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Create video</h5>
            </div>
            <div class="ibox-content">
				<div class="gridster">
				    <ul>
				        <li data-row="1" data-col="1" data-sizex="68" data-sizey="44"><img src="http://valkiro.org/wp-content/uploads/2012/10/VideoPlayer1.png" width="100%" height="100%"></li>
				        <li data-row="2" data-col="1" data-sizex="16" data-sizey="12">Logo</li>
				        <li data-row="2" data-col="1" data-sizex="16" data-sizey="12">Title</li>
				    </ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Settings</h5>
            </div>
            <div class="ibox-content">
            	<form class="form">
            		<div class="form-group">
            			<label>Project Name</label> <input type="text" placeholder="Video name" class="form-control">
						<span class="help-block m-b-none">This is for your use only so you can identify the video in your dashboard.</span>
            		</div>
            		<div class="form-group">
            			<label>Video Code</label> <input type="text" placeholder="Video code" class="form-control">
						<span class="help-block m-b-none">Please see the HELP section to learn how to get your video code. It is not the URL of your video.</span>
            		</div>
            		<div class="form-group">
            			<label>Video Caption</label> <input type="text" placeholder="Video caption" class="form-control">
						<span class="help-block m-b-none">Enter an optional caption for your video on Facebook. This caption will show over the video preview in the lower left hand corner.</span>
            		</div>
            		<div class="form-group">
            			<label>lower text</label> <textarea placeholder="Lower Text" class="form-control"></textarea>
						<span class="help-block m-b-none">You can enter text that will show under the video when it is played.</span>
            		</div>
            	</form>
			</div>
		</div>
	</div>
	<div class="col-lg-7">

		 <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Customization</h5>
            </div>
            <div class="ibox-content">
            	<form class="form">
            		<div class="form-group">
            			<label>Logo image</label> <input type="text" placeholder="Logo Image" class="form-control">
						<span class="help-block m-b-none">This is for your use only so you can identify the video in your dashboard.</span>
            		</div>
            	</form>
			</div>
		</div>
	</div>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/js/plugins/gridster/jquery.gridster.min.css">
<style type="text/css">
	.gridster ul{
		list-style-type: none;
	}
	.gridster ul li{
		transition: opacity .3s,left .3s,top .3s,width .3s,height .3s;
		border: dashed 1px #ccc;
		cursor: move;
	}
	.help-block {
	  font-size: 10px;
	}
</style>
@stop

@section('script')
<script type="text/javascript" src="/js/plugins/gridster/jquery.gridster.min.js"></script>
<script type="text/javascript" src="/js/plugins/angular/angular.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript">
$(function(){ //DOM Ready
 
    $(".gridster ul").gridster({
        widget_margins: [2, 2],
        widget_base_dimensions: [5, 5]
    });
});
</script>
@stop