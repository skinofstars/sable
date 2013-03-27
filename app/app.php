<?php

$app = require __DIR__.'/bootstrap.php';

use Sable\FrontendController;
use Sable\AdminController;

$app->get('/admin', function() use ($app) {
    $ac = new AdminController($app);
    return $ac->render();
});


$app->get('/', function() use ($app){
    $fc = new FrontendController($app);
    return $fc->render();
});

$app->get('/{slug}', function($slug) use ($app) {
    $fc = new FrontendController($app, $slug);
    return $fc->render();
});

return $app;