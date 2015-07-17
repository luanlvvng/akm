<?php

use Phalcon\Mvc\View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaData;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Router\Annotations;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * We register the events manager
 */
$di->set('dispatcher', function() use ($di) {

    $eventsManager = new EventsManager;

    /**
     * Check if the user is allowed to access certain action using the SecurityPlugin
     */
    $eventsManager->attach('dispatch:beforeDispatch', new SecurityPlugin);

    /**
     * Handle exceptions and not-found exceptions using NotFoundPlugin
     */
    $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);

    $dispatcher = new Dispatcher;
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function() use ($config) {
    $url = new UrlProvider();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});


$di->set('view', function() use ($config) {

    $view = new View();

    $view->setViewsDir(APP_PATH . $config->application->viewsDir);

    $view->registerEngines(array(
        ".volt" => 'volt'
    ));

    return $view;
});

/**
 * Setting up volt
 */
$di->set('volt', function($view, $di) use ($config) {

    $volt = new VoltEngine($view, $di);

    $volt->setOptions(array(
        "compiledPath" => APP_PATH . "cache/volt/",
        'compileAlways' => true
    ));

    $compiler = $volt->getCompiler();
    $compiler->addFunction('is_a', 'is_a');
    if ($config->application->debugMode) {
        $volt->setOptions(array(
            'compileAlways' => TRUE,
        ));
    }
    return $volt;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function() use ($config) {
    $dbclass = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    return new $dbclass(array(
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->name
    ));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function() {
    return new MetaData();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function() {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function() {
    return new FlashSession(array(
        'error' => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
    ));
});

/**
 * Register a user component
 */
$di->set('elements', function() {
    return new Elements();
});
$di->set('Custom\MyTags', function() {
    return new Custom\MyTags();
});
$di->set('router', function() {
    $router = new Annotations(false);
    $router->addResource('Faq\Controllers\Faq', '/tu-van');
    $router->addResource('Admin\Controllers\FaqAdmin', '/admin/faq');
    
//    $router->add('/tu-van-cung-chuyen-gia/:action', array(
//        'controller' => 'Faq\Controllers\Faq',
//        'action' => 1,
//    ));
    $router->add('/session/:action', array(
        'controller' => 'session',
        'action' => 1,
    ));
    $router->add('/register', array(
        'controller' => 'register',
        'action' => 'index',
    ));
    $router->add('/gioi-thieu', array(
        'controller' => 'about',
        'action' => 'index',
    ));
    $router->add('/trang-trai-xanh-anka', array(
        'controller' => 'index',
        'action' => 'irisfarm',
    ));
    return $router;
});
