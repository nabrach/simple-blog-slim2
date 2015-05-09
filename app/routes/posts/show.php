<?php

$app->get('/posts/:postId', function($postId) use ($app) {

	$post = $app->db->prepare("
		SELECT
		posts.*,
		CONCAT(users.first_name, ' ', users.last_name) AS author
		FROM posts
		LEFT JOIN users
		ON posts.user_id = users.id
		WHERE posts.id = :postId
	");

	$post->execute(['postId' => $postId]);

	$post = $post->fetch(PDO::FETCH_ASSOC);

	// var_dump($post);
	// die();
	if (!$post) {
		$app->notFound();
	}

	$app->render('posts/show.php', [
		'post' => $post
	]);

})->name('posts.show');