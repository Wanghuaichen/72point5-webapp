<?php

/*
|---------------------
| Application Routes |
|---------------------
*/

$app->get('/', 'MainController@viewHome');

$app->get('/all', 'MainController@getAllSamples');

