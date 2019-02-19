<?php

$conn = new PDO('mysql:host=localhost;dbname=php7','root','363636');
$stmt = $conn->prepare('DELETE FROM tb_usuarios WHERE id_usuario=:ID');
$id = 18;

$stmt->bindParam(':ID', $id);
$stmt->execute();

echo 'Excluido com Sucesso!';