<?php

class ApiController extends \BaseController {

    public function getSearchAuthor($authorname) {
        if (Auth::check()) {
            $mybooks = Auth::user()->books;
            $book_list = array();
            foreach ($mybooks as $book) {
                if (! strcmp($book->book->author, $authorname)) {
                    array_push($book_list,$book->book);
                }
            }
            return Response::json($book_list);
        } else {
            return Redirect::to('/login');
        }
    }

    public function getSearchTitle($title) {
        if (Auth::check()) {
            $mybooks = Auth::user()->books;
            $book_list = array();
            foreach ($mybooks as $book) {
                if (! strcmp($book->book->title, $title)) {
                    array_push($book_list,$book->book);
                }
            }
            return Response::json($book_list);
        } else {
            return Redirect::to('/login');
        }
    }

    public function getSearchCategory($category) {
        if (Auth::check()) {
            $mybooks = Auth::user()->books;
            $book_list = array();
            foreach ($mybooks as $book) {
                if (! strcmp($book->book->category, $category)) {
                    array_push($book_list,$book->book);
                }
            }
            return Response::json($book_list);
        } else {
            return Redirect::to('/login');
        }
    }

    public function getBookList() {
        if (Auth::check()) {
            $mybooks = Auth::user()->books;
            $book_list = array();
            foreach ($mybooks as $book) {
                    array_push($book_list,$book->book);
            }
            return Response::json($book_list);
        } else {
            return Redirect::to('/login');
        }
    }
}
