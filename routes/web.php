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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PagesController@index')->name('home');
Route::get('/about-us','PagesController@aboutUs')->name('aboutus');
Route::get('/events','PagesController@event')->name('event');
Route::get('/gallery','PagesController@gallery')->name('gallery');
Route::get('/registration','PagesController@registration')->name('registration');
Route::get('/blogs','PagesController@blog')->name('blog');
Route::get('/blogs/{id}','PagesController@blogPost')->name('blog.post');
Route::get('/advertise','PagesController@advertise')->name('advertise');
Route::get('/contact','PagesController@contact')->name('contact');
Route::post('/contact','PagesController@sendContactMail')->name('contact.send');
Route::get('/events/participants','PagesController@showEventParticipationForm')->name('event.participation.form');
Route::post('/events/participants','PagesController@storeEventParticipant')->name('event.participant.store');
Route::get('/events/{id}','PagesController@singleEvent')->name('event.single');
Route::get('/events/{id}/register','PagesController@registerForEvent')->name('event.register');
Route::post('/events/register','PagesController@storeEventRegistration')->name('event.register.store');

/**
 * handle sport events registrations
 */
Route::get('/sports/team/{team_id}/members','TeamController@index')->name('events.sport.members');
Route::post('/sports/team/{team_id}/members','TeamController@registerTeamMember')->name('events.sport.members.store');
Route::delete('/sports/team/{team_id}/members/{id}','TeamController@dropTeamMember')->name('events.sport.members.delete');
Route::get('/sports/{id}','PagesController@sportEvents')->name('events.sport')->middleware('auth');

/**
 * Print sport pdfs
 */
Route::get('/sports/team/{team_id}/members/print','TeamController@printTeamMembers')->name('events.sports.members.print');
Route::get('/sports/team/{team_id}/members/{id}/print','TeamController@printTeamMember')->name('events.sports.member.print');

Route::post('/sports/{id}','TeamController@store')->name('team.store');

Route::get('/video/{id}','PagesController@singleVideo')->name('video.single');
Route::get('/verifypayment/{ref}','PagesController@verifyPaystackPayment')->name('verify.payment');
Route::group(['prefix'=>'meet-our-team'],function(){
    Route::get('/management','AboutController@management')->name('about.management');
    Route::get('/executives','AboutController@executives')->name('about.executives');
    Route::view('/board-of-trustees','about.trustees')->name('about.trustees');
});
Route::get('/plans','User\SubscriptionController@index')->name('user.subscriptions.plans');
Route::get('/support','PagesController@support')->name('support.us');
Route::post('/support','PagesController@processSupport')->name('support.us.thanks');

Route::group(['prefix'=>'about-us'],function(){
    Route::view('/our-mission','about.mission')->name('about.mission');
    Route::view('/our-vision','about.vision')->name('about.vision');
    Route::view('/our-focus','about.focus')->name('about.focus');
    Route::view('/our-core-values','about.corevalues')->name('about.corevalues');
    Route::view('/our-goal','about.goal')->name('about.goal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home2');
Route::get('/admin/login','AdminAuth\LoginController@showLoginForm')->name('admin.form.login');
Route::post('/admin/login','AdminAuth\LoginController@login')->name('admin.login');
Route::get('/admin/logout','AdminAuth\LoginController@logout')->name('admin.logout');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function(){
    Route::get('/','AdminController@index')->name('admin.home');
    Route::resource('events','EventsController');
    Route::get('events/{id}/attendees','EventsController@attendees')->name('events.attendees');
    Route::get('events/{id}/participants','EventsController@participants')->name('events.participant');
    Route::resource('categories','CategoriesController');
    Route::resource('users','UsersController');
    Route::resource('blogs','BlogsController');
    Route::resource('admins','AdminsController');
    Route::resource('videos','VideosController');
    Route::resource('plans', 'PlansController');
    Route::get('settings','SettingsController@index')->name('admin.settings');
});

Route::group(['prefix'=>'users','namespace'=>'User','middleware'=>'auth'],function(){
    Route::get('/post','HomeController@post')->name('user.posts');
    Route::post('/post','HomeController@storePost')->name('user.post.store');
    Route::get('/post/{id}/edit','HomeController@editPost')->name('user.post.edit');
    Route::put('/post/{id}/update','HomeController@updatePost')->name('user.post.update');
    Route::delete('/post/{id}','HomeController@deletePost')->name('user.post.delete');
    Route::get('/post/new','HomeController@showNewPostForm')->name('user.post.new');
    Route::get('/videos','HomeController@videos')->name('user.videos');
    Route::get('/video/upload','HomeController@showVideoForm')->name('user.video.form');
    Route::post('/video/upload','HomeController@uploadVideo')->name('user.video.upload');
    Route::delete('/video/{id}/delete','HomeController@deleteVideo')->name('user.video.delete');
    Route::get('/profile','HomeController@profile')->name('user.profile');
    Route::post('/profile/{id}/update','HomeController@profileUpdate')->name('user.profile.update');
    Route::post('/profile/{id}/update-picture','HomeController@updateProfilePicture')->name('user.picture.update');
    Route::post('/subscribe','SubscriptionController@subscribe')->name('user.subscribe');
    Route::post('/subscribe/{id}/cancel','SubscriptionController@cancel')->name('user.subscription.cancel');

});
Route::post('/comment','User\HomeController@storeComment')->name('comment.store');
Route::post('/reply','User\HomeController@storeReply')->name('reply.store');
Route::get('ajax/states/get','Admin\AjaxsController@getStates')->name('states.get');
Route::get('ajax/cities/get','Admin\AjaxsController@getCities')->name('cities.get');
