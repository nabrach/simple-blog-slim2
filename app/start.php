<?php

require '../vendor/autoload.php';

$app = new \Slim\Slim();

// Database
$app->container->singleton('db', function(){
	return new PDO('mysql:host=localhost;dbname=slim2-blog', 'root', 'root');
});

require 'routes.php';

$app->run();