<?php

namespace Sable\Tests;

use Silex\WebTestCase;

class FrontendTest extends WebTestCase 
{
 
    public function createApplication() {
        return require __DIR__ . '/../../app/app.php';
    }
 
    public function testIndex() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($crawler->filter('html:contains("Welcome")')->count() > 0);
    }
 
    public function testAbout() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/about');
        $this->assertTrue($crawler->filter('html:contains("About")')->count() > 0);
    }

}