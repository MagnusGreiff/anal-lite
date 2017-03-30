<?php

define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/.."));
define("ANAX_APP_PATH", ANAX_INSTALL_PATH);

require ANAX_INSTALL_PATH . "/config/error_reporting.php";

require ANAX_INSTALL_PATH . "/vendor/autoload.php";


$app = new \Radchasay\App\App();
$app->request = new \Anax\Request\Request();
$app->url = new \Anax\Url\Url();
$app->router =new \Anax\Route\RouterInjectable();
$app->view = new \Anax\View\ViewContainer();
$app->response = new \Anax\Response\Response();


$app->request->init();
$app->view->setApp($app);

$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());

$app->url->configure("url.php");
$app->view->configure("view.php");
$app->url->setDefaultsFromConfiguration();


//Load the routes
require ANAX_INSTALL_PATH . "/config/route.php";

$app->router->handle($app->request->getRoute());

