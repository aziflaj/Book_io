<?php

Route::get('/hello', function() {
    return Response::json(array(
        'message'   => 'Hello, World!'
    ));
});

Route::get('/user/{id}', function($id) {
    return Response::json(array(
        'id'        => $id,
        'user'      => User::find($id),
        'books'  => User::find($id)->books
    ));
});

Route::controller('/','IndexController');