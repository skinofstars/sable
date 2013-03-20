<?php

require_once __DIR__.'/bootstrap.php';

use Sable\FrontendController;
use Sable\AdminController;

new FrontendController($app);
new AdminController($app);
