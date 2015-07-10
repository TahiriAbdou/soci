var app = angular.module('vids', ['ngSanitize','ngFileUpload'],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

var makeEmbed = function(code,width,height,style,options){
	options = options || 'frameborder="0" allowfullscreen';
	return '<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/'+code+'?autoplay=1&controls=0" '+options+' style="'+style+'" ></iframe>';
};

app.controller('ProjectSimple',function($scope,Upload){
	$scope.project = {
		name:'',
		caption:'Video Title',
		description: 'Video Description'
	};
	$scope.video = {};
	$scope.videoSettings = {};
	$scope.titleSettings = {
		fontType:'Helvetica',
		fontSize:'18px',
		fontColor:'#5c4800',
		fontWeigth:'bold'
	};
	$scope.descriptionSettings = {
		fontType:'Helvetica',
		fontSize:'14px',
		fontColor:'#555',
		fontWeigth:'bold'
	};
	$scope.logoSettings = {
		img:false,
		url:''
	};
	$scope.buttonSettings = {
		img:false,
		link:'http://example.com',
		text:'Button Text'
	};
	$scope.currentForm = 'video';
	$scope.store = false;
	$scope.img = false;
	var videoSelector = '#myvideo';
	var titleSelector = '#caption';
	var descriptionSelector = '#description';
	var saveCustomVideo = function (obj){
		angular.element(videoSelector).html(makeEmbed($scope.project.videoCode,'100%','100%','border:'+obj.borderWidth+' solid '+obj.borderColor));
	}
	var saveCustomTitle = function(obj){
		angular.element(titleSelector).attr('style','padding: 12px 6px;font-family:"'+obj.fontType+'";font-size:'+obj.fontSize+';color:'+obj.fontColor+';font-weight:'+obj.fontWeigth);
	}
	var saveCustomDescription = function(obj){
		angular.element(descriptionSelector).attr('style','padding: 8px;font-family:"'+obj.fontType+'";font-size:'+obj.fontSize+';color:'+obj.fontColor+';font-weight:'+obj.fontWeigth);
	}
	$scope.loadForm = function(type){
		$scope.currentForm = type;
	};
	$scope.loadVideo = function(){
		if($scope.project.videoCode==='' || $scope.project.videoCode === undefined)
			return false;
		style='';
		$scope.video.preview = makeEmbed($scope.project.videoCode,"100%","100%",style);
		angular.element(videoSelector).html($scope.video.preview);
	}
	$scope.selectThisBtn = function(id){
		id = '#'+id;
		angular.element('.button.small').removeClass('selectedbtn');
		$scope.buttonSettings.class= angular.element(id).attr('class');
		angular.element(id).addClass('selectedbtn');
	};
	$scope.saveCustomization = function(){
		switch ($scope.currentForm) {
			case 'video' : 
			$scope.videoSettings.borderColor = angular.element('#videoColor').val();
			saveCustomVideo($scope.videoSettings);
			break;
			case 'title' :
			$scope.titleSettings.fontColor = angular.element('#titleColor').val();
			$scope.titleSettings.fontType = angular.element('#titleFont').val();
			$scope.titleSettings.fontWeigth = angular.element('#titleFontWeight').val();
			saveCustomTitle($scope.titleSettings);
			break;
			case 'description':
			$scope.descriptionSettings.fontColor = angular.element('#descriptionColor').val();
			$scope.descriptionSettings.fontType = angular.element('#descriptionFont').val();
			$scope.descriptionSettings.fontWeigth = angular.element('#descriptionFontWeight').val();
			saveCustomDescription($scope.descriptionSettings);
			case 'button':
			angular.element('#button').text('');
			break;
			default: break; 
		}
	};
	$scope.$watch('logo', function () {
        $scope.upload($scope.logo,'logo');
    });
	$scope.$watch('project', function () {
        console.log($scope.project);
    },true);
	$scope.$watch('button', function () {
        $scope.upload($scope.button,'button');
    });
    $scope.MakePreview = function(){
    	var target = angular.element('#modalContent');
    	target.html(angular.element('.gridster').parent().html());
    	if(!$scope.store){
    		angular.element('#modalContent').find('#button').attr('href',$scope.buttonSettings.link);
    		angular.element('#modalContent').find('#button').css('cursor','auto');
    	}else{
    		angular.element('#modalContent').find('#buttonPreview').attr('href',$scope.buttonSettings.link);
    	}
    	angular.element('#modalContent').find('#button').attr('target','_blanc');
    	angular.element('#modalContent').find('#buttonPreview').attr('target','_blanc');
    	angular.element('#modalContent').find('#logoPreview').attr('href',$scope.logoSettings.url);
    	console.log($scope.buttonSettings);
    }
	$scope.upload = function (files,type) {
        if (files && files.length) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                Upload.upload({
                    url: '/mediaUpload',
                    fields: {'fileType': type},
                    fileName: 'logo',
                    file: file,
                    transformRequest    : angular.identity
                }).progress(function (evt) {
                    var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);
                }).success(function (data, status, headers, config) {
                	if(!data.error){
                		if(type=='logo'){
							angular.element('#logo').attr('src',data.url);
                			$scope.logoSettings.img = data.url;
                		}
                		if(type=='button'){
							angular.element('#button').attr('src',data.url);
                			$scope.buttonSettings.img = data.url;
                		}
                		
                	}
                });
            }
        }
    };

});
