<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/config/config.php';

$app = new Silex\Application();

$app['debug'] = APP_DEBUG;

// VIEWS
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../src/Sable/Frontend/views',
));

// FORMS
// we'll need this for editing pages.
// ideally we build the forms dynamically depending on the fields available for a page
$app->register(new Silex\Provider\FormServiceProvider());

// DATABASE
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'dbname'    => DB_NAME,
        'user'      => DB_USER,
        'password'  => DB_PASSWORD,
        'host'      => DB_HOST,
        'driver'    => DB_DRIVER,
    ),
));
