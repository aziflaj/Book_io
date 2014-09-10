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
        $rules = array(
            'isbn'              => 'required',
            'title'             => 'required',
            'author'            => 'required',
            'category'          => 'required',
            'publishing_house'  => 'required',
            'page_no'           => 'required',
            'publishing_year'   => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            //all fields are set

            $isbn = Input::get('isbn');

            //check if isbn exists in the books table
            $_test = Book::where('isbn','=',$isbn)->first();

            if ($_test != null) {
                //the book is in the books table, just add him for this user

                $mybook = new LibraryBooks;
                $mybook->user_id = Auth::user()->id;
                $mybook->book_isbn = $isbn;
                $mybook->copies_no = 1; //TODO: change this
                $mybook->save();

                return "This book was saved on library_books";
            }

            return ($_test == null) ? 'null' : 'not null';

        } else {
            //some field forgotten
        }

        return Response::json(Input::all());
    }
}
