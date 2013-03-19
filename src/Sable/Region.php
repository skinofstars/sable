<?php

namespace Sable;

class Region
{
    protected $app;

    protected $id;
    protected $name;
    protected $value;

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __construct($app, $id)
    {
        $this->app = $app;

        if (isset($id)) {
            $this->id = $id;
            $this->loadRegion();

            return $this;
        }
    }

    public function loadRegion()
    {
        // FIXME - again, there must be a better way of loading

        $sql = "SELECT DISTINCT * FROM regions WHERE id = ?";
        $results = $this->app['db']->fetchAll($sql, array($this->id));

        $this->name = $results[0]['name'];
        $this->value = $results[0]['value'];
    }

}
