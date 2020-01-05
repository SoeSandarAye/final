<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::resource('/userregister','RegisterController');




Route::middleware('role:admin')->group(function () {

Route::get('/home', function () {
    return redirect()->route('socialuser.index');
});
Route::get('/admin', function () {
    return redirect()->route('socialuser.index');
});

Route::post('/user/logout', 'LoginuserController@logout')->name('logouts');

Route::resource('/user','LoginuserController');

Route::resource('post','BackendPostController');

Route::resource('adminuser','BackendUserController');

Route::resource('socialuser','BackendSocialuserController');

Route::resource('/admintimeline','AdmintimelineController');

Route::resource('/admincomment','AdmincommentController');

});







Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('user.index');
});
Route::resource('/user','LoginuserController');
Route::post('/user/logout', 'LoginuserController@logout')->name('logouts');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/all', 'HomeController@showall')->name('showall');

Route::get('/home/showall', 'HomeController@showpeople')->name('showpeople');

Route::get('/home/showfriend', 'HomeController@showfriend')->name('showfriend');

Route::get('/deletepost/{id}', 'PostController@deletepost');

Route::resource('posts','PostController');

Route::get('/comments/load/', 'CommentController@showcomment')->name('showcmt');

Route::resource('comments','CommentController');

Route::get('/addfriend/{id}', 'AddfriendController@add');


Route::get('peopleknow/people/add/{id}', 'PeopleknowController@adddetails')->name('addfrienddetail');

Route::get('/people/add/{id}', 'PeopleknowController@adddetails')->name('addfrienddetail');

Route::get('/confirm/{id}', 'AddfriendController@confirm');

Route::get('/delete/{id}', 'AddfriendController@deleteuser');



Route::post('/home/like','LikeController@storelike')->name('storelike');

Route::post('/home/like/show','LikeController@showlikes')->name('showlikes');
Route::resource('/peopleknow','PeopleknowController');

Route::resource('/usertimeline','UsertimelineController');

Route::resource('/updateprofile','UpdateprofileController');

Route::resource('/updatepassword','UpdatepasswordController');


Auth::routes();

// Route::resource('/addfriend','AddfriendController');




// ---------




