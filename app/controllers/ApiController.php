<?php

class ApiController extends \BaseController {

    public function getSearchAuthor($authorname) {
        $mybooks = Auth::user()->books
            //getting isbn of user's books
        $isbns = array();
        foreach ($mybooks as $book) {
            array_push($isbns, $book->book_isbn);
        }
            //getting author books
        $books = Book::where('author','=',$authorname)->get();
            //getting isbn of author books
        $book_isbns = array();
        foreach ($books as $book) {
            array_push($book_isbns, $book->isbn);
        }
            //comparing isbns-s of user's and author's books and pushing to array those with same isbn
            //book_authors has the final isbn-s
        $book_authors = array();
        foreach ($isbns as $isbn) {
            foreach ($book_isbns as $book_isbn) {
                if($isbn == $book_isbn)
                    array_push($book_authors, $isbn);
            }
        }
            //getting books with final isbn-s from book table
        $final = array();
        foreach ($book_authors as $valid) {
            $final = Book::where('isbn','=',$valid)->get();
            return Response::json(array(
                'books' => $final
            ));
        }
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
