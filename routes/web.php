<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Songs
    Route::delete('songs/destroy', 'SongsController@massDestroy')->name('songs.massDestroy');
    Route::resource('songs', 'SongsController');

    // Song Summaries
    Route::delete('song-summaries/destroy', 'SongSummaryController@massDestroy')->name('song-summaries.massDestroy');
    Route::resource('song-summaries', 'SongSummaryController');

    // Song Works
    Route::delete('song-works/destroy', 'SongWorksController@massDestroy')->name('song-works.massDestroy');
    Route::resource('song-works', 'SongWorksController');

    // Song Hooks
    Route::delete('song-hooks/destroy', 'SongHookController@massDestroy')->name('song-hooks.massDestroy');
    Route::resource('song-hooks', 'SongHookController');

    // Song Verses
    Route::delete('song-verses/destroy', 'SongVersesController@massDestroy')->name('song-verses.massDestroy');
    Route::resource('song-verses', 'SongVersesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
