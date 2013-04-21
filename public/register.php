<?php
/**
 * User: Equan Pr.
 * Date: 3/30/13
 * Time: 6:38 AM
 */
require '../vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->useIncludePath(true);

/**
 * Register custom library
 */
$loader->registerNamespaces(array(
    'SimpleStore' => __DIR__ . '/../lib'
));

$loader->register();