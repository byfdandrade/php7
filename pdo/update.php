<?php

$conn = new PDO('mysql:host=localhost;dbname=php7','root','363636');
$stmt = $conn->prepare('UPDATE tb_usuarios SET deslogin=:LOGIN, dessenha=:PASSWORD WHERE id_usuario=:ID');
$id = 18;
$login = 'José Carlos';
$password = '2424';

$stmt->bindParam(':ID', $id);
$stmt->bindParam(':LOGIN', $login);
$stmt->bindParam(':PASSWORD', $password);
$stmt->execute();

echo 'Dados alterado com Sucesso!';