<?php

require_once __DIR__.'/bootstrap.php';

use Sable\FrontendController;
use Sable\AdminController;

// $app->get('/', function() use ($app){
//     $fc = new FrontendController($app);
//     return $fc->render();
// });

// $app->get('/{pagename}', function($pagename) use ($app) {
//     $fc = new FrontendController($app, $pagename);
//     return $fc->render();
// });

new FrontendController($app);
new AdminController($app);
