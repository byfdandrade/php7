<?php
$name = 'image';
if(!is_dir($name)){
    mkdir($name);
    echo 'Diretório '.$name.' criado com Sucesso!';
} else {
    //Para remover rmdir($name);
    echo 'Já exite o diretório: '.$name;
}

