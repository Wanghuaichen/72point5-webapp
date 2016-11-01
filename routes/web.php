<?php

/*
|---------------------
| Application Routes |
|---------------------
*/

$app->get('/api', function() use ($app) {
    return "Hello!";
    //return $app->make('view')->make('layouts/home');
});

$app->get('/', 'MainController@getAll');


