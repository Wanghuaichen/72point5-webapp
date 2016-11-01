<?php

/*
|---------------------
| Application Routes |
|---------------------
*/

$app->get('/api', function() use ($app) {
    return view('layouts/home', ['name' => 'Sasparilla Slim']);
});

$app->get('/', 'MainController@getAll');


