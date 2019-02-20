<?php

function __autoload($nomeClasse) {
    if (file_exists('classes'.DIRECTORY_SEPARATOR.$nomeClasse.'.php') === true) {
        require_once 'classes'.DIRECTORY_SEPARATOR.$nomeClasse.'.php';
    } else {
        echo 'Classe não existe no diretório.';
        exit();
    }

    //var_dump($nomeClasse);
}

$carro = new DelRey();
$carro->acelerar(300);
