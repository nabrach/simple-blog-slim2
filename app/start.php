<?php

require '../vendor/autoload.php';

$app = new \Slim\Slim([
	'view' => new \Slim\Views\Twig()
]);

// Database
$app->container->singleton('db', function(){
	return new PDO('mysql:host=localhost;dbname=slim2-blog', 'root', 'root');
});

// Views
$view = $app->view();
$view->setTemplatesDirectory('../app/views');
$view->parserExtensions = [
	new \Slim\Views\TwigExtension()
];

require 'routes.php';

$app->run();