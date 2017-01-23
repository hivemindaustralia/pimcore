<?php

use Pimcore\Config;
use Symfony\Component\Debug\Debug;

$debug = Pimcore::inDebugMode();
if ($debug && defined('PIMCORE_SYMFONY_MODE') && PIMCORE_SYMFONY_MODE) {
    Debug::enable();
}

$kernel = new AppKernel(Config::getEnvironment(), $debug);

// see https://github.com/symfony/symfony/issues/20668
if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
}

Pimcore::setKernel($kernel);

return $kernel;
