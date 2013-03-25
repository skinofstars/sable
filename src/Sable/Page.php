<?php

namespace Sable;

use Sable\Region;

class Page
{
    protected $id;
    protected $slug;
    protected $title;
    protected $tags = array();
    protected $modified;
    protected $regions = array();

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

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified(\DateTime $modified)
    {
        $this->modified = $modified;
    }    

    public function getTags()
    {
        return $this->tags;
    }

    public function addTag($tag)
    {
        if (!in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
        }
    }

    /**
     * Add a region
     *
     * @param Region $region
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

    public function fromArray($pageArray)
    {
        if (isset($pageArray['id'])) $this->setId($pageArray['id']);
        if (isset($pageArray['title'])) $this->setTitle($pageArray['title']);
        if (isset($pageArray['slug'])) $this->setSlug($pageArray['slug']);
        if (isset($pageArray['modified'])) $this->setModified($pageArray['modified']);

        if (isset($pageArray['tags'])) {
            foreach ($pageArray['tags'] as $tag) {
                $this->addTag($tag);
            }    
        }
    }

}
