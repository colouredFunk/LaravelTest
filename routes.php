<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('managementreports');
});

Route::get('mr/{name}', function($name)
{
    return 'Misterrr '.$name;
});
*/
/*Route::get('/', function()
{
   $create = Report::create(array(
            'heading' => "asds",
            'status' => 0
        ));
    
      $report = new Report;
    $report -> heading = 'kaa';
    $report -> save();
    var_dump($report);
    
});*/

Route::get('/', array(
	'as' => 'home',
    'uses' => 'HomeController@Home'
));



/*Route::post('submit', function(){   
  return Input::get('fName');
});*/

/*Route::get('account', function(){
  return 'submitted3';  
});

Route::post('submit', function(){   
  return 'submitted1';  
});

Route::post('form-submit', array('before'=>'csrf',function(){
 return 'submitted2';  
}));

Route::post('/account/', function(){
  return 'submitted3';  
});
Route::post('account/', function(){
  return 'submitted3';  
});
Route::post('/account/create', function(){
  return 'submitted3';  
});
Route::post('/account/create/', function(){
  return 'submitted3';  
});*/
/*
 Unauthenticated group
*/
/* Route::post('/account/create', function(){
        return Response::json(['succuss' => true]);
        });*/
  Route::post('account/create', array(
            'as' => 'account-create-post', 
            'uses' => 'AccountController@postCreate'
            ));
Route::group(array('before' => 'guest'), function () {
    
    /*
     CSRF Protection group
    */
    Route::group(array('before' => 'csrf'), function () {
         /*
        Create account (POST)
        */
       /*   Route::post('account/create', array(
            'as' => 'account-create-post', 
            'uses' => 'AccountController@postCreate'
            ));*/
    });
     /*
        Create account (GET)
    */
   

});
 Route::get('/account/create', array(
        'as' => 'account-create', 
        'uses' => 'AccountController@getCreate'
    ));