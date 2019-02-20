<?php
interface Veiculo{
    public function acelerar($velocidade);
    public function frenar($velocidade);
    public function trocarMarcha($marcha);
}

abstract class Automovel implements Veiculo{
    public function acelerar($velocidade) {
        echo 'O veiculo acelerou até '.$velocidade.' km/h <br>';
    }
    public function frenar($velocidade) {
        echo 'O veiculo frenou a '.$velocidade.' km/h <br>';
    }
    public function trocarMarcha($marcha) {
        echo 'O veiculo engatou a marcha '.$marcha.'.<br>';
    }
}

