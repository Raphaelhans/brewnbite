<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kar', function () {
    return view('Employees.Employee');
});

Route::get('/kar1', function () {
    return view('Employees.History');
});
