<?php

$conn = new PDO('mysql:host=localhost;dbname=php7','root','363636');
$stmt = $conn->prepare('INSERT INTO tb_usuarios (deslogin,dessenha) VALUES (:LOGIN, :PASSWORD)');
$login = 'José';
$password = '242424';

$stmt->bindParam(':LOGIN', $login);
$stmt->bindParam(':PASSWORD', $password);
$stmt->execute();
