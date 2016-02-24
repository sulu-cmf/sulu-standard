<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

// Define application environment
defined('SYMFONY_ENV') || define('SYMFONY_ENV', getenv('SYMFONY_ENV') ?: 'prod');
defined('SULU_MAINTENANCE') || define('SULU_MAINTENANCE', getenv('SULU_MAINTENANCE') ?: false);
defined('SYMFONY_DEBUG') ||
define('SYMFONY_DEBUG', filter_var(getenv('SYMFONY_DEBUG') ?: SYMFONY_ENV === 'dev', FILTER_VALIDATE_BOOLEAN));

// maintenance mode
$maintenanceFilePath = __DIR__ . '/../app/maintenance.php';
if (SULU_MAINTENANCE && file_exists($maintenanceFilePath)) {
    // show maintenance mode and exit if no allowed IP is met
    if (require $maintenanceFilePath) {
        exit();
    }
}

$loader = require __DIR__ . '/../app/autoload.php';
include_once __DIR__ . '/../app/bootstrap.php.cache';

if (SYMFONY_DEBUG) {
    Debug::enable();
}

// Enable APC for autoloading to improve performance.
// You should change the ApcClassLoader first argument to a unique prefix
// in order to prevent cache key conflicts with other applications
// also using APC.
/*
$apcLoader = new ApcClassLoader(sha1(__FILE__), $loader);
$loader->unregister();
$apcLoader->register(true);
*/

if (preg_match('/^\/admin(\/|$)/', $_SERVER['REQUEST_URI'])) {
    require_once __DIR__ . '/../app/AdminKernel.php';

    $kernel = new AdminKernel(SYMFONY_ENV, SYMFONY_DEBUG);
    $kernel->loadClassCache();

    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
} else {
    require_once __DIR__ . '/../app/WebsiteKernel.php';

    $kernel = new WebsiteKernel(SYMFONY_ENV, SYMFONY_DEBUG);
    $kernel->loadClassCache();

    // Comment this line if you want to use the "varnish" http
    // caching strategy. See http://sulu.readthedocs.org/en/latest/cookbook/caching-with-varnish.html
    if (SYMFONY_ENV != 'dev') {
        require_once __DIR__ . '/../app/WebsiteCache.php';
        $kernel = new WebsiteCache($kernel);

        // When using the HttpCache, you need to call the method in your front controller
        // instead of relying on the configuration parameter
        Request::enableHttpMethodParameterOverride();
    }

    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
}
