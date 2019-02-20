<?php

$conn = new PDO('mysql:host=localhost;dbname=php7','root','363636');
$conn->beginTransaction();

$stmt = $conn->prepare('DELETE FROM tb_usuarios WHERE id_usuario=:ID');
$id = 2;

$stmt->bindParam(':ID', $id);
$stmt->execute();
$conn->rollBack();
//$conn->commit();
echo 'Excluido com Sucesso!';