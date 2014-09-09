<?php

class ApiController extends \BaseController {

    public function getSearchAuthor($authorname) {
        $mybooks = Auth::user()->books;

        $book_list = array();
        foreach ($mybooks as $book) {
            if (! strcmp($book->book->author, $authorname)) {
                array_push($book_list,$book->book);
            }
        }

        return Response::json($book_list);
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
