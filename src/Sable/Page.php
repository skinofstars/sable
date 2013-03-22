<?php

namespace Sable;

use Sable\Region;

class Page
{
    protected $id;
    protected $slug;
    protected $title;
    protected $regions = array();

    // TODO $tags

    public function __construct()
    {

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    

    /**
     * Add a region
     *
     * @param $region
     * @return $this
     */
    public function addRegion(Region $region)
    {

        if (!in_array($region, $this->regions)) {
            $this->regions[$region->getName()] = $region;
        }

        return $this;
    }

    /**
     * Returns the regions for a page.
     *
     * @return region[] The page regions
     */
    public function getRegions()
    {
        return $this->regions;
    }




}
