<?php

Route::group([
    'namespace' => 'Hadikhah\User\Http\Controllers',
    'middleware' => 'web'
],
    function ($routes) {
        Auth::routes(['verify' => true]);
    });
