<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
//$loader->registerNamespaces(
//        array(
//            'Faq\Controllers' => APP_PATH . $config->application->modulesDir . 'faq/controllers/',
//            'Faq\Models' => APP_PATH . $config->application->modulesDir . 'faq/models/'
//        )
//);
$loader->registerDirs(
        array(
            APP_PATH . $config->application->modulesDir,
            APP_PATH . $config->application->controllersDir,
            APP_PATH . $config->application->pluginsDir,
            APP_PATH . $config->application->libraryDir,
            APP_PATH . $config->application->modelsDir,
            APP_PATH . $config->application->formsDir
        )
)->register();
