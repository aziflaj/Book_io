<?php

class ApiController extends \BaseController {

    public function getSearchAuthor($authorname) {
        $books = Book::where('author','=',$authorname)->get();
        return Response::json(array(
            'books' => $books
        ));
    }
    public function getSearchTitle($title) {
        $books = Book::where('title','=',$title)->get();
        return Response::json(array(
            'books' => $books
        ));
    }
    public function getSearchCategory($category) {
        $books = Book::where('category','=',$category)->get();
        return Response::json(array(
            'books' => $books
        ));
    }
}
