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
$app->post('/getLatestSamples', 'MainController@getLatestSamples');
$app->post('/getSingleSamples', 'MainController@getSingleSamples');
$app->post('/getCowIds', 'MainController@getCowIds');
$app->post('/new', 'MainController@newSample');
$app->post('/createCSV', 'MainController@createCSV');
