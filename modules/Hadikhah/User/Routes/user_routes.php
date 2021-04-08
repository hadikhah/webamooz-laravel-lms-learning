<?php

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'web'
], function ($routes) {
    Auth::routes(['verify' => true]);
});
