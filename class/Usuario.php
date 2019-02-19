<?php

class Usuario{

private $id_usuario;
private $deslogin;
private $dessenha;
private $dtcadastro;

function getId_usuario() {
    return $this->id_usuario;
}

function getDeslogin() {
    return $this->deslogin;
}

function getDessenha() {
    return $this->dessenha;
}

function getDtcadastro() {
    return $this->dtcadastro;
}

function setId_usuario($id_usuario) {
    $this->id_usuario = $id_usuario;
}

function setDeslogin($deslogin) {
    $this->deslogin = $deslogin;
}

function setDessenha($dessenha) {
    $this->dessenha = $dessenha;
}

function setDtcadastro($dtcadastro) {
    $this->dtcadastro = $dtcadastro;
}

public function loadById($id){
$sql = new Sql();
$result = $sql->select('select * from tb_usuarios where id_usuario=:ID',array(
    ':ID'=>$id
));
if (count($result) > 0){
    $row = $result[0];
    $this->setId_usuario($row['id_usuario']);
    $this->setDeslogin($row['deslogin']);
    $this->setDessenha($row['dessenha']);
    $this->setDtcadastro(new DateTime($row['dtcadastro']));
   
}
}

public function __toString() {
    return json_encode(array(
        'id_usuario'=>$this->getId_usuario(),
        'deslogin'=>$this->getDeslogin(),
        'dessenha'=>$this->getDessenha(),
        'dtcadastro'=>$this->getDtcadastro()->format("d/m/Y H:i:s")), JSON_UNESCAPED_SLASHES);
}

}