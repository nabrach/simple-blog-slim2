<?php

$app->get('/', function() use ($app) {
	
	$posts = $app->db->query("
		SELECT
		posts.*
		FROM posts
		LEFT JOIN users
		ON posts.user_id = users.id
	")->fetchAll(PDO::FETCH_ASSOC);

	var_dump($posts);
	die();
	
})->name('home');