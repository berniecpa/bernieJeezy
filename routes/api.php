<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Songs
    Route::apiResource('songs', 'SongsApiController');

    // Song Summaries
    Route::apiResource('song-summaries', 'SongSummaryApiController');

    // Song Works
    Route::apiResource('song-works', 'SongWorksApiController');

    // Song Hooks
    Route::apiResource('song-hooks', 'SongHookApiController');

    // Song Verses
    Route::apiResource('song-verses', 'SongVersesApiController');
});
