<?php
/**
 * Created by PhpStorm.
 * User: russ
 * Date: 02.05.16
 * Time: 1:03 PM
 */

require_once __DIR__ . '/vendor/autoload.php';

use \Dixons\Rouse\ProductController;

$controller = new ProductController();
echo $controller->detail(1) . PHP_EOL;
echo $controller->registerReport() . PHP_EOL;