<?php

namespace Sable;

class Region
{
    protected $id;
    protected $name;
    protected $value;
    protected $tags = array();
    protected $modified;

    // TODO type
    // i'd realy like regions to not be tied to just, saya, text.
    // text, image, audio, video, file
    // so i'm thinking of a mimetype field
    
    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
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

    public function fromArray($regionArray)
    {
        if (isset($regionArray['id'])) $this->setId($regionArray['id']);
        if (isset($regionArray['name'])) $this->setName($regionArray['name']);
        if (isset($regionArray['value'])) $this->setValue($regionArray['value']);
        if (isset($regionArray['modified'])) $this->setModified($regionArray['modified']);

        if (isset($regionArray['tags'])) {
            foreach ($regionArray['tags'] as $tag) {
                $this->addTag($tag);
            }    
        }
    }

}
