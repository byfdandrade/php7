<?php

$conn = new PDO('sqlsrv:dbname=php7;host=localhost\SQLEXPRESS;ConnectionPooling=0','sa','363636');
$stmt = $conn->prepare('select * from tb_usuarios order by deslogin');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    foreach ($row as $key => $value){
        echo '<strong>'.$key.':</strong>'.$value.'<br>';
    }
    echo '========================<br>';
    
}