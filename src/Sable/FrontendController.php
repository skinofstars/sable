<?php

namespace Sable;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Filesystem\Filesystem,
    Symfony\Component\Filesystem\Exception\IOException;

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
        $this->app->get('/', function() use ($app){
            $page = $this->loadPage('home');
            return $this->render($page);
        });

        $this->app->get('/{pagename}', function ($pagename) use ($app) {
            $page = $this->loadPage($pagename);
            return $this->render($page);
        });
    }


    public function loadPage($slug)
    {
        
        $sql = "SELECT DISTINCT * FROM pages WHERE slug = ?";
        $results = $this->app['db']->fetchAll($sql, array($slug));

        if (!isset($results[0])) {
            $app->abort(404, "Page $slug does not exist.");
        }

        $page = new Page();
        $page->setSlug($slug);
        $page->setId($results[0]['id']);
        $page->setTitle($results[0]['title']);

        $regions = $this->getPageRegions($page->getId());
        foreach ($regions as $region) {
            $page->addRegion($region);
        }

        return $page;
    }

    /**
     * Get the regions for a Page
     *
     * @return array
     */
    protected function getPageRegions($page_id)
    {
        // load regions by relations table
        $qb = $this->app['db']->createQueryBuilder();
        $qb->select('*')
            ->from('regions', 'r')
            ->innerJoin('r', 'page_region_rel', 'prr', 'prr.region_id = r.id')
            ->where('prr.page_id = :page_id')
            ->setParameter(':page_id', $page_id);

        $results = $qb->execute();

        // compile results
        foreach ($results as $result) {
            $region = new Region();
            $region->setId($result['id']);
            $region->setName($result['name']);
            $region->setValue($result['value']);

            $regions[$region->getName()] = $region;
        }

        return $regions;
    }

    public function render($page)
    {
        // we want to do a check to see if there is template for a slug.
        // 
        // i'd rather not force people to use twig extension, but it is nice and clear
        // so i'd probably like to check for .twig version first, then page without
        // the fall back to default page in the end
        //  
        // anyway, for now i'll just do twig and ponder on it more :)
        
        $fileToRender = 'page.html.twig';

        $fs = new Filesystem(); 
        $dir = __dir__ . '/Frontend/views/';

        $file = $dir . $page->getSlug() . '.html.twig';

        if ($fs->exists($file)) {
            $fileToRender = $page->getSlug() . '.html.twig';
        } 

        return $this->app['twig']->render($fileToRender, array(
            'regions' => $page->getRegions(),
        ));
    }


}
