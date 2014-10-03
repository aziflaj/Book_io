<?php

class IndexController extends \BaseController {

    public function getIndex() {
        if (Auth::check()) {
            //return Auth::user(); //show the main view
            return View::make('hello');
        } else {
            return Redirect::to('/login');
        }
    }

    public function getLogin() {
        if (Auth::check()) {
            return Redirect::to('/'); //redirect to index if the user is logged in
        } else {
            return View::make('login');
        }
    }

    public function postLogin() {

        $rules = array(
            'username'   => 'required',
            'password'   => 'required'
        );

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->passes()) {
            $credentials = array(
                'username'  => Input::get('username'),
                'password'  => Input::get('password'),
            );


            if (Auth::attempt($credentials,true)) {
                return Redirect::to('/');

            } else {
                return Redirect::to('/login')->with(array('error' => 0));
            }
        } else {
            return Redirect::to('/login');
        }

    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/');
    }
}