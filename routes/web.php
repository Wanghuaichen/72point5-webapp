<?php

/*
|---------------------
| Application Routes |
|---------------------
*/

/* views */
$app->get('/', 'MainController@viewHome');

/* api */
$app->post('/getAllRaw', 'MainController@getAllRawSamples');
$app->post('/newRaw', 'MainController@newRawSample');


