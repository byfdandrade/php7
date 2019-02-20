<?php

class Usuario {

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

    public function loadById($id) {
        $sql = new Sql();
        $result = $sql->select('select * from tb_usuarios where id_usuario=:ID', array(
            ':ID' => $id
        ));
        if (count($result) > 0) {
            $this->setData($result[0]);
        }
    }

    public static function getList() {
        $sql = new Sql();
        return $sql->select('select * from tb_usuarios order by deslogin;');
    }

    public static function search($login) {
        $sql = new Sql();
        return $sql->select('select * from tb_usuarios where deslogin LIKE :SEARCH order by deslogin', array(
                    ':SEARCH' => '%' . $login . '%'
        ));
    }

    public function login($login, $password) {
        $sql = new Sql();
        $result = $sql->select('select * from tb_usuarios where deslogin=:LOGIN and dessenha=:PASSWORD', array(
            ':LOGIN' => $login,
            ':PASSWORD' => $password
        ));
        if (count($result) > 0) {
            $this->setData($result[0]);
        } else {
            throw new Exception('Login ou Senha Inválidos.');
        }
    }

    public function setData($data) {
        $this->setId_usuario($data['id_usuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    }

    public function insert() {
        $sql = new Sql();
        $result = $sql->select('CALL sp_usuarios_insert(:LOGIN,:PASSWORD)', array(
            ':LOGIN' => $this->getDeslogin(),
            ':PASSWORD' => $this->getDessenha()
        ));
        if (count($result) > 0) {
            $this->setData($result[0]);
        }
    }
    
    public function update($login,$password){
        $this->setDeslogin($login);
        $this->setDessenha($password);
        
        $sql = new Sql();
        
        $sql->query('UPDATE tb_usuarios SET deslogin=:LOGIN, dessenha=:PASSWORD WHERE id_usuario=:ID', array(
            ':LOGIN'=> $this->getDeslogin(),
            ':PASSWORD'=> $this->getDessenha(),
            ':ID'=> $this->getId_usuario()
        ));
    }
    
    public function delete(){
        $sql = new Sql();
        $sql->query('DELETE FROM tb_usuarios WHERE id_usuario=:ID',array(
            ':ID'=> $this->getId_usuario()
        ));
        $this->setId_usuario(0);
        $this->setDeslogin('');
        $this->setDessenha('');
        $this->setDtcadastro(new DateTime());
    }

    public function __construct($login='',$password='') {
        $this->setDeslogin($login);
        $this->setDessenha($password);
    }

    

    public function __toString() {
        return json_encode(array(
            'id_usuario' => $this->getId_usuario(),
            'deslogin' => $this->getDeslogin(),
            'dessenha' => $this->getDessenha(),
            'dtcadastro' => $this->getDtcadastro()->format("d/m/Y H:i:s")), JSON_UNESCAPED_SLASHES);
            //'dtcadastro' => $this->getDtcadastro()));
    }
    
    
    
    
}