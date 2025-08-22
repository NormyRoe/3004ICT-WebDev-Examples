<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('greetingForm');
});

Route::post('greeting', function () {
    $name = request("name");
    $age = request("age");

    $errors = [];

    if (empty($name) || strlen($name) < 2 || strlen($name) > 50 || !is_string($name)){
        $errors['name'] = "Name must be a string between 2 and 50 characters";
    }

    if (!empty($errors)){
        return back()->withErrors($errors);
    }

    return view('greeting')->with('user', $name)->with('age', $age + 1);
});


Route::get('user/{name}', function ($name){
    return "Hello $name";
});