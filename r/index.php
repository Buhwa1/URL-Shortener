<?php
	include '../db.php';

	$db = new Database("localhost", "url", "root", "");
	$db = $db->connect();

	$id = $_GET['c'];

	$query = "SELECT * FROM urls WHERE id = :ID LIMIT 1";
	$stmt = $db->prepare($query);

	$params = array(
		"ID" => $id
	);

	$stmt->execute($params);

	$url = $stmt->fetch();

	header("location: " . $url['long_url']);
