<?php

namespace Sable;

use Sable\Region;

class Page
{
    protected $regions = array();
    protected $app;
    protected $pagename = 'home';


    public function __construct($app, $pagename='')
    {
        $this->app = $app;

        if ($pagename != '') {
            $this->pagename = $pagename;
        }
    }

    /**
     * Get the regions for a Page
     *
     * @return array
     */
    public function getRegions()
    {
        // at the moment we're assuming regions have their page mapping as a column
        // however, we should be loading a page and then regions
        // regions should have a many to many relationship with pages

        $sql = "SELECT * FROM regions WHERE page = ?";
        $results = $this->app['db']->fetchAll($sql, array($this->pagename));

        // prepare for display
        foreach ($results as $result) {
            $regions[$result['name']] = $result;
        }

        return $regions;
    }

    public function render()
    {
        return $this->app['twig']->render($this->pagename.'.html.twig', array(
            'regions' => $this->getRegions(),
        ));
    }
}
