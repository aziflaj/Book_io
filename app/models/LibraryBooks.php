<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
class LibraryBooks extends Eloquent {

    public $table = 'library_books';
    public $timestamps = false;

    public function book() {
        return $this->hasOne('Book','isbn','book_isbn');
    }
}