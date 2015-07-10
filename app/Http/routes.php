<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.dashboard');
});

Route::group(['prefix'=>'projects'],function(){
	Route::get('make/{template}',function($template){
		return view('home.make_'.$template);
	});
});

Route::get('/new', function () {
    return view('home.new');
});

Route::get('/tutos', function () {
    return view('home.tutos');
});

Route::get('/create', function () {
    return view('home.create');
});

Route::post('/mediaUpload',function(Request $request){
	$destinationPath = 'uploads/'; 
	$extension = 'png'; // getting logo extension
	$fileName = rand(11111,99999).'.'.$extension; // renameing logo
	$filename = $destinationPath.$fileName;
	if(move_uploaded_file($_FILES['file']["tmp_name"],$filename)){
		return ['error'=>0,'url'=>asset($filename)];
	}
	return ['error'=>1];
});