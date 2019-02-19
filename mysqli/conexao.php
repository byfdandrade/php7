<?php

$conn = new mysqli('localhost','root','363636','php7');
if ($conn->connect_error){
    echo 'Error: '.$conn->connect_error;
} else{
    echo 'Conectado com sucesso!';
}

//Fazendo um insert
$stmt = $conn->prepare('insert into tb_usuarios (deslogin,dessenha) values (?,?)');
$stmt->bind_param('ss',$login,$pass);
$login = 'fdandrade';
$pass = '12345';
//$stmt->execute();
echo '<br>';
//////////////////////////////////////////////////////////////
//Fazendo Consulta
$result = $conn->query('select * from tb_usuarios order by deslogin');
$dataJson = array();
while ($row = $result->fetch_assoc()){
    array_push($dataJson, $row);
    
}
echo json_encode($dataJson);


