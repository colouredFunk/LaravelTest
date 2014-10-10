<?php



Route::get('/', array(
	'as' => 'home',
    'uses' => 'HomeController@Home'
));

 Route::get('/account/create', array(
        'as' => 'account-create', 
        'uses' => 'AccountController@getCreate'
    ));
 Route::post('account/create', array(
            'as' => 'account-create-post', 
            'uses' => 'AccountController@postCreate'
            ));
/*
 Unauthenticated group
*/
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
