<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/hello', function()
{
    return "Hello, World!";
});