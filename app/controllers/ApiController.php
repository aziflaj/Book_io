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
            } else {
                //the book doesn't exist in the books table
                //add it there then add it to the user
                $mybook = new Book;

                $mybook->author = Input::get('author');
                $mybook->category = Input::get('category');
                $mybook->isbn = $isbn;
                $mybook->page_no = Input::get('page_no');
                $mybook->publishing_house = Input::get('publishing_house');
                $mybook->publishing_year = Input::get('publishing_year');
                $mybook->title = Input::get('title');

                $mybook->save();

                //now that the book was added to books
                //add him to the user
                $new_book = new LibraryBooks;
                $new_book->user_id = Auth::user()->id;
                $new_book->book_isbn = $isbn;
                $new_book->copies_no = 1; //TODO: change this

                $new_book->save();

                return "This was stored to books with id ". $mybook->id;

            }
        } else {
            //some field forgotten
        }

        return Response::json(Input::all());
    }
}
