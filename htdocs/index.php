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
$app->session = new \Radchasay\Session\Session();
$app->cookie = new \Radchasay\Cookie\Cookie();
$app->navbar = new \Radchasay\Navbar\Navbar();
/*$app->dice = new \Radchasay\DiceGame\Game();*/
$app->db = new \Radchasay\Database\Connect();
$app->dropdown = new \Radchasay\Dropdown\Dropdown();
$app->user = new \Radchasay\User\User();
$app->content = new \Radchasay\Content\Content();
$app->filter = new \Mos\TextFilter\CTextFilter();
$app->block = new \Radchasay\Block\Block();

$app->navbar->configure("navbar.php");
$app->navbar->setApp($app);

$app->db->configure("database.php");
$app->db->setApp($app);
$app->db->connect();

$app->content->setApp($app);


$app->request->init();
$app->view->setApp($app);

$app->dropdown->setApp($app);
$app->user->setApp($app);


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
