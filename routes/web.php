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
$app->post('/getSingleSamples', 'MainController@getSingleSamples');
$app->post('/getNumCows', 'MainController@getNumCows');
$app->post('/newRaw', 'MainController@newRawSample');
$app->post('/createCSV', 'MainController@createCSV');
