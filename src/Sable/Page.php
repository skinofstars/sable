<?php

namespace Sable;

use Sable\Region;

class Page
{
    protected $app;

    // we should probably do getters and setters...
    // keep it simple for now
    protected $id;
    protected $title;
    protected $slug = 'error-404';

    protected $regions = array();
    
    public function __construct($app, $slug='')
    {
        $this->app = $app;

        if ($slug != '') {
            $this->slug = $slug;

            // for now, we only load a page if a slug is provided
            $this->loadPage($this->slug);
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function loadPage($slug)
    {
        // is $slug sanatised?
        // 
        // is there a better way? fetchOne?
        $sql = "SELECT DISTINCT * FROM pages WHERE slug = ?";
        $results = $this->app['db']->fetchAll($sql, array($this->slug));

        $this->id = $results[0]['id'];
        $this->title = $results[0]['title'];

        $this->regions = $this->getRegions();
    }

    /**
     * Get the regions for a Page
     *
     * @return array
     */
    protected function getRegions()
    {

        // load the page_region_rels table, then each region loads using it's own sql.
        // TODO sort this into a single load. who knows how many regions you'd get on a page?!

        $sql = "SELECT * FROM page_region_rel WHERE page_id = ?";
        $results = $this->app['db']->fetchAll($sql, array($this->id));

        // prepare for display
        foreach ($results as $result) {
            $region = new Region($this->app, $result['region_id']);
            $regions[$region->getName()] = $region;
        }

        return $regions;
    }

    public function render()
    {
        // could do with knowing what twig tempates are available 

        return $this->app['twig']->render($this->slug.'.html.twig', array(
            'regions' => $this->regions,
        ));
    }
}
