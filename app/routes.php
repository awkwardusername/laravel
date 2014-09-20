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

Route::get('/', function () {
    return View::make('hello');
});

Route::group(array('prefix' => 'users'), function () {

    Route::get('login', 'UsersController@getLogin');
    Route::post('login', 'UsersController@postLogin');

    Route::get('confirm/{code}', 'UsersController@getConfirm');

    Route::post('forgot-password', 'UsersController@postForgotPassword');

    Route::get('reset/{token}', 'UsersController@getResetPassword');
    Route::post('reset', 'UsersController@postResetPassword');

    Route::post('register', 'UsersController@postRegister');

    Route::get('logout', 'UsersController@getLogout');

});

Route::group(array('prefix' => Config::get('kitchen.admin.route')), function () {

    Route::get('/', array('before' => 'auth.admin', 'uses' => 'AdminController@getDashboard'));
    Route::get('users', array('before' => 'auth.admin', 'uses' => 'AdminController@getUsers'));
    Route::post('users', array('before' => 'admin|csrf', 'uses' => 'AdminController@postUsers'));
    Route::get('roles', array('before' => 'auth.admin', 'uses' => 'AdminController@getRoles'));
    Route::get('users/{id}', array('before' => 'auth.admin', 'uses' => 'AdminController@getUserProfile'));

});

HTML::macro('amazonCloudfront', function ($path) {
    return 'http://dg53kaji1bj9b.cloudfront.net/' . $path;
});

HTML::macro('metronicMenu', function ($route, $text, $icon = 'icon-home', $subMenu = array()) {
    $active   = '';
    $selected = '';
    $arrow    = '';
    $mainUrl  = 'javascript:;';
    if ($route != null) {
        $mainUrl = url($route);
        if (Request::path() == $route) {
            $active   = 'active';
            $selected = '<span class="selected"></span>';
        }
    }

    $subMenuArray = array();
    if (count($subMenu) > 0) {
        $arrow = '<span class="arrow"></span>';
        foreach ($subMenu as $sub) {
            $subActive = '';
            if (strpos(Request::path(), $sub['route']) !== false) {
                $subActive = 'active';
                $active .= 'active open';
                $arrow = '<span class="arrow open"></span>';
            }
            $subMenuArray[] = '<li class="' . $subActive . '"><a href="' . url($sub['route']) . '">' . $sub['text'] . '</a>';
        }
    }

    $menu = '<li class="' . $active . '"><a href="' . $mainUrl . '"><i class="' . $icon . '"></i><span class="title">' . $text . '</span>' . $selected . $arrow . '</a>';

    if (count($subMenuArray) > 0) {
        $menu .= '<ul class="sub-menu">';
        foreach ($subMenuArray as $s) {
            $menu .= $s;
        }
        $menu .= '</ul>';
    }

    $menu .= '</li>';

    return $menu;

});