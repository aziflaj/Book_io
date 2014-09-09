<?php

Route::group(array('prefix' => 'api/v1','before' => 'auth'), function() {

    Route::controller('/','ApiController');
});

Route::controller('/','IndexController');
