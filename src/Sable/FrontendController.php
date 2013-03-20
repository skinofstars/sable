<?php

namespace Sable;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;

use Sable\Page;
use Sable\Region;

class FrontendController
{

    /**
     * @var \Silex\Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->init();
    }

    public function init()
    {
        $this->app->get('/', array($this, 'renderHomepage'))->bind('home');
        $this->app->get('/{pagename}', array($this, 'renderPage'))->bind($pagename);
    }

    public function renderHomepage()
    {
        $page = new Page($this->app, 'home');
        return $page->render();
    }

    public function renderPage($pagename)
    {
        $page = new Page($this->app, $pagename);
        return $page->render();
    }

}
