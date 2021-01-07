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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin routes
Route::group(['middleware' => ['permission:super admin | can create user']], function () {
    Route::get('create_user', 'YouthDbms\UserController@index');
});

// youth info routes
Route::group(['middleware' => ['permission:can view'], 'as' => 'youthInfo.'], function () {
    Route::get('youth_information', 'YouthDbms\YouthInfoController@index')->name('index');
    Route::post('youth_info', 'YouthDbms\YouthInfoController@store');
    Route::post('update_youth_info/{id}', 'YouthDbms\YouthInfoController@update')->name('update');
    Route::get('update_youth_info/{id}', 'YouthDbms\YouthInfoController@show')->name('show');
    Route::get('delete_youth_info/{id}', 'YouthDbms\YouthInfoController@destroy');
    Route::get('upload_youth_info', 'YouthDbms\YouthInfoController@upload_youth_info_view');
    Route::post('upload_youth_info', 'YouthDbms\YouthInfoController@upload_youth_info');
});

// youth organization routes
Route::group(['middleware' => ['permission:can view']], function () {
    Route::get('youth_organizations', 'YouthDbms\YouthOrgController@index')->name('youthOrg.index');
});

// youth organization can create
Route::group(['middleware' => ['permission:can create youth'], 'as' => 'youthOrg.'], function () {
    Route::post('youth_organizations', 'YouthDbms\YouthOrgController@store');
    Route::post('update_youth_organizations/{id}', 'YouthDbms\YouthOrgController@update')->name('update');
    Route::get('delete_youth_organizations/{id}', 'YouthDbms\YouthOrgController@destroy');
    Route::get('youth_organizations/{id}', 'YouthDbms\YouthOrgController@show')->name('show');
    Route::post('upload_youth_org', 'YouthDbms\YouthOrgController@upload_youth_org');
    Route::get('upload_youth_org', 'YouthDbms\YouthOrgController@upload_youth_org_view');
});

// partners
Route::group(['middleware' => ['permission:can view']], function () {
    Route::get('partners', 'YouthDbms\PartnersController@index');
});

// can creat partners
Route::group(['middleware' => ['permission:can view']], function () {
    Route::post('partners', 'YouthDbms\PartnersController@store');
    Route::post('update_partners/{id}', 'YouthDbms\PartnersController@update');
    Route::get('delete_partners/{id}', 'YouthDbms\PartnersController@destroy');
    Route::post('upload_partners', 'YouthDbms\PartnersController@upload_partners');
    Route::get('upload_partners', 'YouthDbms\PartnersController@upload_partners_view');
});

// mails
Route::group(['middleware' => ['permission:can send mail']], function () {
    Route::get('mail', 'YouthDbms\MailController@index');
    Route::post('mail', 'YouthDbms\MailController@send_mail');
});

// can create user
Route::group(['middleware' => ['permission:can create user']], function () {
    Route::get('users', 'YouthDbms\UserController@index');
    Route::post('users', 'YouthDbms\UserController@store');
    Route::post('update_user', 'YouthDbms\UserController@update');
    Route::get('delete_user/{id}', 'YouthDbms\UserController@delete_user');
});

//can view
Route::group(['middleware' => ['permission:can view']], function () {
    Route::get('community_engagement', 'YouthDbms\CommunityEngagementController@index');
});

// can create community engagement
Route::group(['middleware' => ['permission:can create community engagement']], function () {
    Route::post('community_engagement', 'YouthDbms\CommunityEngagementController@store');
    Route::post('update_community_engagement', 'YouthDbms\CommunityEngagementController@update');
    Route::get('delete_community_engagement/{id}', 'YouthDbms\CommunityEngagementController@delete');
    Route::post('upload_community_engagement', 'YouthDbms\CommunityEngagementController@upload_community_engagement');
    Route::get('upload_community_engagement', 'YouthDbms\CommunityEngagementController@upload_community_engagement_view');
});
