<?php
header("Cache-Control: no-cache, no-store");
if(isset($_GET['_url']) && $_GET['_url']=='/phpinfo'){
    echo phpinfo();
    die();
}
error_reporting(E_ALL);
ini_set('display_error', 1);

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

//$_GET['_url'] = '/contact/send';
//$_SERVER['REQUEST_METHOD'] = 'POST';
error_reporting(E_ALL);
ini_set('display_error', 1);

try {

    define('APP_PATH', realpath('..') . '/');

    /**
     * Read the configuration
     */
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');

    /**
     * Auto-loader configuration
     */
    require APP_PATH . 'app/config/loader.php';

    /**
     * Load application services
     */
    require APP_PATH . 'app/config/services.php';

    $application = new Application($di);
    echo $application->handle()->getContent();
    
} catch (Exception $e) {
    echo $e->getMessage();
    
}

