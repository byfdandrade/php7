<?php
require_once 'config.php';
use Cliente\Cadastro;

$cad = new Cadastro();
$cad->setNome('Fernando Andrade');
$cad->setEmail('domingues.fernando@hotmail.com');
$cad->setSenha('12345');

echo $cad->registrarVenda();