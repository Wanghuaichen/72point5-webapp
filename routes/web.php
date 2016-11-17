<?php

/*
|---------------------
| Application Routes |
|---------------------
*/

$app->get('/', 'MainController@viewHome');

$app->post('/all', 'MainController@getAllSamples');

