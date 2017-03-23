<?php

/*
|---------------------
| Application Routes |
|---------------------
*/

/* views */
$app->get('/', 'MainController@viewHome');

/* api */
$app->post('/getNormalSamples', 'MainController@getNormalSamples');
$app->post('/getAccelSamples', 'MainController@getAccelSamples');
$app->post('/newRaw', 'MainController@newRawSample');
$app->post('/downloadAsCSV', 'MainController@downloadAsCSV');
