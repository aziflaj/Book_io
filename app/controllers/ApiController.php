<?php

class ApiController extends \BaseController {

    public function getSearchAuthor($authorname) {
        $mybooks = Auth::user()->books;
        $book_list = array();
        foreach ($mybooks as $book) {
            if (! strcasecmp($book->book->author, $authorname)) {
                array_push($book_list,$book->book);
            }
        }
        return Response::json($book_list);
    }

    public function getSearchTitle($title) {
        $mybooks = Auth::user()->books;
        $book_list = array();

        foreach ($mybooks as $book) {
            if (stripos($book->book->title,$title) !== false) {
                array_push($book_list,$book->book);
            }
        }
        return Response::json($book_list);
    }

    public function getSearchCategory($category) {
        $mybooks = Auth::user()->books;
        $book_list = array();
        foreach ($mybooks as $book) {
            if (! strcasecmp($book->book->category, $category)) {
                array_push($book_list,$book->book);
            }
        }
        return Response::json($book_list);
    }

    public function getBookList() {
        $mybooks = Auth::user()->books;
        $book_list = array();
        foreach ($mybooks as $book) {

            $book->book->copies_no = $book->copies_no;

            array_push($book_list,$book->book);
        }
        return Response::json($book_list);
    }


    public function getAdd() {
        return View::make('addbook');
    }

    public function postAdd() {
        return Response::json(Input::all());
    }
}
