@extends('app',['links'=>[['title'=>'Test','url'=>'http://whatever.com']],'h'=>'Tableau de bord'])

@section('content')
<div ng-controller="ProjectSimple">
	<div class="col-lg-12 clearfix">
		<div class="pull-left">
			<button class="btn btn-primary dim" type="button"><i class="fa fa-save"></i> Save Project</button>	
		</div>
		<div class="pull-right">
			<button class="btn btn-danger dim" type="button" ng-click="MakePreview();" data-toggle="modal" data-target="#previewModal"><i class="fa fa-play"></i> Preview Video</button>
			<button class="btn btn-default dim" type="button"><i class="fa fa-share"></i> Embed Code</button>
			<button class="btn btn-success dim" type="button"><i class="fa fa-facebook"></i> Share on Facebook</button>
			<button class="btn btn-info dim" type="button"><i class="fa fa-twitter"></i> Share on Twitter</button>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Settings</h5>
			</div>
			<div class="ibox-content">
				<form class="form">
					<div class="form-group">
						<label>Project Name</label> <input type="text" placeholder="Video name" class="form-control" ng-model="project.name">
						<span class="help-block m-b-none">This is for your use only so you can identify the video in your dashboard.</span>
					</div>
					<div class="form-group">
						<label>Video Code</label> 
						<div class="input-group">
							<input type="text" placeholder="Video code" ng-model="project.videoCode" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-primary" ng-click="loadVideo();" type="button">Load</button>
							</span>
						</div>
						<span class="help-block m-b-none">Please see the HELP section to learn how to get your video code. It is not the URL of your video.</span>
					</div>
					<div class="form-group">
						<label>Video Caption</label> <input type="text" placeholder="Video caption" ng-model="project.caption" class="form-control">
						<span class="help-block m-b-none">Enter an optional caption for your video on Facebook. This caption will show over the video preview in the lower left hand corner.</span>
					</div>
					<div class="form-group">
						<label>lower text</label> <textarea placeholder="Lower Text" ng-model="project.description" class="form-control"></textarea>
						<span class="help-block m-b-none">You can enter text that will show under the video when it is played.</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Video Maker</h5>
			</div>
			<div class="ibox-content">
				<div class="gridster">
					<ul>
						<li ng-click="loadForm('video');" data-row="1" data-col="1" data-sizex="68" data-sizey="44" id="myvideo">
							<img src="/player.png" width="100%" height="100%">
						</li>
						<li ng-click="loadForm('logo');" data-row="2" data-col="1" data-sizex="16" data-sizey="16" style="padding:6px">
							<a href="javascript:;" id="logoPreview">
								<img src="/your-logo.png" id="logo" width="100%" height="100%" style="border-radius: 6px;"> 
							</a>
						</li>
						<li ng-click="loadForm('title');" data-row="2" data-col="2" data-sizex="32" data-sizey="5">
							<div id="caption"><% project.caption %></div>
						</li>
						<li ng-click="loadForm('button');" data-row="2" data-col="2" data-sizex="20" data-sizey="5">
							<a href="javascript:;" id="button" class="btn" style="width:100%;height:100%;cursor:move;background-size: 100% 100%;background-image: url(<% buttonSettings.img %>)" ng-show="!store" >
								Your button
							</a>
							<a href="javascript:;" id="buttonPreview" ng-show="store" style="width:100%;margin: 3px 0;" ng-class="buttonSettings.class">
								<% buttonSettings.text %>
							</a>
						</li>
						<li ng-click="loadForm('description');" data-row="2" data-col="2" data-sizex="52" data-sizey="10">
							<div id="description"><% project.description %></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Customization</h5>
			</div>
			<div class="ibox-content">
				<form class="form">
					<div ng-show="currentForm=='video'">
						<div class="form-group">
							<label>Video Width</label> <input type="text" placeholder="default=100%" ng-model="videoSettings.width" class="form-control">
						</div>
						<div class="form-group">
							<label>Video Height</label> <input type="text" placeholder="default=100%" ng-model="videoSettings.height" class="form-control">
						</div>
						<div class="form-group">
							<label>Border Width</label> <input type="text" placeholder="default=0 no border" ng-model="videoSettings.borderWidth" class="form-control">
						</div>
						<div class="form-group">
							<label>Border Color</label> <input type="text" placeholder="Choose a color" id="videoColor" ng-model="videoSettings.borderColor" class="form-control colorpicker">
						</div>
					</div>
					<div ng-show="currentForm=='logo'">
						<div class="form-group">
							<a class="btn btn-info btn-sm" ngf-select ng-model="logo"> <i class="fa fa-upload"></i> <% logoSettings.img === false? 'Select Image' : 'Change Image' %> </a> <br />
							<img ng-show="logoSettings.img!==false" src="<% logoSettings.img %>" width="100px" height="100px">
						</div>
						<div class="form-group">
							<label>Url link</label> <input type="text" placeholder="Url link" ng-model="logoSettings.url" class="form-control">
						</div>
					</div>
					<div ng-show="currentForm=='title'">
						<div class="form-group">
							<label>Font</label>
							<select class="form-control" id="titleFont" ng-model="titleSettings.fontType">
								<option value="Serif">Serif</option>
								<option value="Sans">Sans</option>
								<option value="Arial">Arial</option>
								<option value="Arial Black">Arial Black</option>
								<option value="Courier">Courier</option>
								<option value="Courier New">Courier New</option>
								<option value="Comic Sans MS">Comic Sans MS</option>
								<option value="Helvetica">Helvetica</option>
								<option value="Impact">Impact</option>
								<option value="Lucida Grande">Lucida Grande</option>
								<option value="Lucida Sans">Lucida Sans</option>
								<option value="Tahoma">Tahoma</option>
								<option value="Times">Times</option>
								<option value="Times New Roman">Times New Roman</option>
								<option value="Verdana">Verdana</option>
							</select>
						</div>
						<div class="form-group">
							<label>Font size</label> <input type="text" ng-model="titleSettings.fontSize" class="form-control" placeholder="in pixel" />
						</div>
						<div class="form-group">
							<label>Font Color</label> <input type="text" ng-model="titleSettings.fontColor" id="titleColor" class="form-control colorpicker" value="#CCCCCC" placeholder="pick a color" />
						</div>
						<div class="form-group">
							<label>Font weight</label>
							<select class="form-control" id="titleFontWeight" ng-model="titleSettings.fontWeigth">
								<option value="100">100</option>
								<option value="200">200</option>
								<option value="normal">Normal</option>
								<option value="bold">Bold</option>
							</select>
						</div>
					</div>
					<div ng-show="currentForm=='description'">
						<div class="form-group">
							<label>Font</label>
							<select class="form-control" id="descriptionFont" ng-model="descriptionSettings.fontType">
								<option value="Serif">Serif</option>
								<option value="Sans">Sans</option>
								<option value="Arial">Arial</option>
								<option value="Arial Black">Arial Black</option>
								<option value="Courier">Courier</option>
								<option value="Courier New">Courier New</option>
								<option value="Comic Sans MS">Comic Sans MS</option>
								<option value="Helvetica">Helvetica</option>
								<option value="Impact">Impact</option>
								<option value="Lucida Grande">Lucida Grande</option>
								<option value="Lucida Sans">Lucida Sans</option>
								<option value="Tahoma">Tahoma</option>
								<option value="Times">Times</option>
								<option value="Times New Roman">Times New Roman</option>
								<option value="Verdana">Verdana</option>
							</select>
						</div>
						<div class="form-group">
							<label>Font size</label> <input type="text" class="form-control" placeholder="in pixel" ng-model="descriptionSettings.fontSize"/>
						</div>
						<div class="form-group">
							<label>Font Color</label> <input type="text" class="form-control colorpicker" id="descriptionColor" value="#CCCCCC" placeholder="pick a color" ng-model="descriptionSettings.fontColor"/>
						</div>
						<div class="form-group">
							<label>Font weight</label>
							<select class="form-control" id="descriptionFontWeight" ng-model="descriptionSettings.fontWeigth">
								<option value="100">100</option>
								<option value="200">200</option>
								<option value="normal">Normal</option>
								<option value="bold">Bold</option>
							</select>
						</div>
					</div>
					<div ng-show="currentForm=='button'">
						<div class="form-group">
							<label>Button type</label> <br />
							<input type="radio" name="buttonType" ng-value="true" ng-model="store"> Choose from stock <br>
							<input type="radio" name="buttonType" ng-value="false" ng-model="store"> Upload image button
						</div>
						<div class="form-group" ng-show="store">
							<label>Button Store</label>
							<div class="buttons">
									<a href="javascript:;" id="btn-store-1" ng-click="selectThisBtn('btn-store-1');" class="button small orange selectedbtn">Button text</a>
									<a href="javascript:;" id="btn-store-2" ng-click="selectThisBtn('btn-store-2');" class="button small orange-hover">Button text</a>
									<a href="javascript:;" id="btn-store-3" ng-click="selectThisBtn('btn-store-3');" class="button small green">Button text</a>
									<a href="javascript:;" id="btn-store-4" ng-click="selectThisBtn('btn-store-4');" class="button small green-hover">Button text</a>
									<a href="javascript:;" id="btn-store-5" ng-click="selectThisBtn('btn-store-5');" class="button small yellow">Button text</a>
									<a href="javascript:;" id="btn-store-6" ng-click="selectThisBtn('btn-store-6');" class="button small yellow-hover">Button text</a>		
									<a href="javascript:;" id="btn-store-7" ng-click="selectThisBtn('btn-store-7');" class="button small blue">Button text</a>
									<a href="javascript:;" id="btn-store-8" ng-click="selectThisBtn('btn-store-8');" class="button small blue-hover">Button text</a>
									<a href="javascript:;" id="btn-store-9" ng-click="selectThisBtn('btn-store-9');" class="button small red">Button text</a>
									<a href="javascript:;" id="btn-store-10" ng-click="selectThisBtn('btn-store-10');" class="button small red-hover">Button text</a>
									<a href="javascript:;" id="btn-store-11" ng-click="selectThisBtn('btn-store-11');" class="button small white">Button text</a>
									<a href="javascript:;" id="btn-store-12" ng-click="selectThisBtn('btn-store-12');" class="button small white-hover">Button text</a>
									<a href="javascript:;" id="btn-store-13" ng-click="selectThisBtn('btn-store-13');" class="button small purple">Button text</a>
									<a href="javascript:;" id="btn-store-14" ng-click="selectThisBtn('btn-store-14');" class="button small purple-hover">Button text</a>
									<a href="javascript:;" id="btn-store-15" ng-click="selectThisBtn('btn-store-15');" class="button small black">Button text</a>
									<a href="javascript:;" id="btn-store-16" ng-click="selectThisBtn('btn-store-16');" class="button small black-hover">Button text</a>
							</div>
						</div>
						<div class="form-group" ng-show="store">
							<label>Button Text</label>
							<input type="text" class="form-control" ng-model="buttonSettings.text"/>
						</div>
						<div class="form-group" ng-show="!store">
							<a class="btn btn-info btn-sm" ngf-select ng-model="button"> <i class="fa fa-upload"></i> <% buttonSettings.img === false? 'Select Image button' : 'Change Image Button' %> </a> <br />
							<img ng-show="buttonSettings.img!==false" src="<% buttonSettings.img %>" width="200px" height="40px">
						</div>
						<div class="form-group">
							<label>Button link</label>
							<input type="url" class="form-control" ng-model="buttonSettings.link"/>
						</div>
					</div>
					<div class="form-actions">
						<button class="btn btn-primary" type="button" ng-click="saveCustomization();">Save Customization</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal inmodal fade" id="previewModal" tabindex="-1" role="dialog"  aria-hidden="true">
	    <div class="modal-dialog modal-lg" style="width:690px">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                <h4 class="modal-title"><i class="fa fa-play"></i> Video Preview </h4>
	            </div>
	            <div class="modal-body">
	                <div id="modalContent"></div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@stop

@section('style')
<link rel="stylesheet" type="text/css" href="/js/plugins/colorpicker/bootstrap-colorpicker.min.css">
<link rel="stylesheet" type="text/css" href="/js/plugins/gridster/jquery.gridster.min.css">
<link rel="stylesheet" type="text/css" href="/css/buttons.css">
<style type="text/css">
	.gridster ul{
		list-style-type: none;
	}
	.gridster ul li{
		transition: opacity .3s,left .3s,top .3s,width .3s,height .3s;
		border: dashed 2px #ccc;
		background-color: #f5f5f5;
		cursor: move;
	}
	.gridster ul li.selected{
		border: solid 2px #aaa;
	}
	.help-block {
		font-size: 10px;
	}
	.selectedbtn{
		border: 2px solid #666;
	}
	.selectedbtn:hover{
		border: 2px solid #666;
	}
	#modalContent ul li{
		border: none;
		background-color: transparent;
		cursor: auto;
	}
</style>
@stop

@section('script')
<script type="text/javascript" src="/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript" src="/js/plugins/gridster/jquery.gridster.min.js"></script>
<script type="text/javascript" src="/js/plugins/angular/angular.min.js"></script>
<script type="text/javascript" src="/js/plugins/angular/angular-sanitize.min.js"></script>
<script type="text/javascript" src="/js/plugins/file-upload/ng-file-upload-shim.min.js"></script>
<script type="text/javascript" src="/js/plugins/file-upload/ng-file-upload.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript">
$(function(){ //DOM Ready
	$('.colorpicker').colorpicker();
	$(".gridster ul").gridster({
		widget_margins: [2, 2],
		widget_base_dimensions: [5, 5]
	});
});
</script>
@stop