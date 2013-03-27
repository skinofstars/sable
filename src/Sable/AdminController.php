<?php

namespace Sable;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;

use Sable\Page;
use Sable\Region;

class AdminController
{

    /**
     * @var \Silex\Application
     */
    protected $app;
    protected $page;

    public function __construct(Application $app)
    {
        $this->app = $app;

        //$this->page = $this->loadPage($slug);
        //return $this->render($page);
    }


    public function init()
    {

        // TODO
        // Actually, this is all todo :)

        $this->app->get('/login', array($this, 'renderLogin'))->bind('login');
        $this->app->get('/admin', array($this, 'renderDashboard'))->bind('admin');


        // login
        // http://silex.sensiolabs.org/doc/providers/security.html



    }

    public function renderLogin()
    {
        // $page = new Page($this->app, 'home');
        // return $page->render();
    }

    public function renderDashboard()
    {
        // $page = new Page($this->app, $pagename);
        // return $page->render();
    }

}
