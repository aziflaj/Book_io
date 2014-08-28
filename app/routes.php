<?php

Route::get('/hello', function() {
    return Response::json(array(
        'message'   => 'Hello, World!'
    ));
});

Route::get('/user/{id}', function($id) {

    $books = array();

    foreach(User::find($id)->books as $book) {
        array_push($books, $book->book);
    }

    return Response::json(array(
        'id'        => $id,
        'user'      => User::find($id),
        'books'     => $books
    ));
});


Route::controller('/','IndexController');