<?php
require_once 'config.php';

//$sql = new Sql();
//$usuarios = $sql->select('Select * from tb_usuarios');
//echo json_encode($usuarios);

//Carrega um usuário
/*$user = new Usuario();
$user->loadById(16);
echo $user;*/

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Busca pelo Login
//$search = Usuario::search('root');
//echo json_encode($search);


//Carrega Usuário pelo Login e Senha
//$usuario = new Usuario();
//$usuario->login('root','12345');
//echo $usuario;

//Cadastra Usuario
//$user = new Usuario('elaine', '6969');
//$user->insert();
//echo $user;

//Alterar um Usuário
//$user = new Usuario();
//$user->loadById(21);
//$user->update('elaine camargo','69');
//echo $user;

//Deleta uma Usuário

$id = $_GET['id'];
$user = new Usuario();
$user->loadById($id);
$user->delete();
echo $user;
