<?php

require_once __DIR__.'/bootstrap.php';

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;
use Sable\Page;



// ROUTES
// homepage
$app->get('/', function() use ($app){
    $page = new Page($app);
    return $page->render();
});

// normal pages
$app->get('/{pagename}', function ($pagename) use ($app) {
    $page = new Page($app, $pagename);
    return $page->render();
});



// err


// login
// http://silex.sensiolabs.org/doc/providers/security.html
$app->get('/login', function(Request $request) use ($app){

});

// admin
// ... not sure if we need this, or just use the normal pages
$app->get('/admin/{page}', function($page, Request $request) use ($app){

    $regions = array();

    // if submit, update regions
    if($request->getMethod() == 'POST'){

    }

    $pageName = 'page';

    // else return regions for route, as if normal
    return $app['twig']->render($pageName.'.html.twig', array(
        'regions' => $regions,
        'admin' => true,
    ));

});
