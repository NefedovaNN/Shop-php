<?php
 $DBH = new \PDO("mysql:host=127.0.0.1;dbname=shop", 'test', 'point1503');
 $DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$STH = $DBH->prepare("SELECT * FROM products WHERE id = :id");
$id = 1;
$STH->bindParam(':id', $id);
$data = ['id' => 1];
$STH->execute($data);
var_dump($STH->fetch());