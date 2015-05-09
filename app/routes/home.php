<?php

$app->get('/', function() use ($app) {
	
	$posts = $app->db->query("
		SELECT
		posts.*,
		CONCAT(users.first_name, ' ', users.last_name) AS author
		FROM posts
		LEFT JOIN users
		ON posts.user_id = users.id
	")->fetchAll(PDO::FETCH_ASSOC);

	$app->render('home.php', [
		'posts' => $posts
	]);

})->name('home');