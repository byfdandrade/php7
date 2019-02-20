<?php
abstract class Animal{
    
    public function comunica(){
        return 'Som';
    }
    
    public function mover(){
        return 'Anda';
    }
    
}

class Cachorro extends Animal{
    
    public function comunica() {
        return 'Late';
    }   
}

class Gato extends Animal{
    
    public function comunica() {
        return 'Mia';
    }
}

class Passaro extends Animal{
    public function comunica() {
        return 'Canta';
    }
    public function mover() {
        return 'Voa e '.parent::mover();
    }
    
}


$bicho = new Cachorro();
echo $bicho->comunica().'<br>';
echo $bicho->mover().'<br>';
echo '=================================<br>';
$bichano = new Gato();
echo $bichano->comunica().'<br>';
echo $bichano->mover().'<br>';
echo '=================================<br>';
$passaro = new Passaro();
echo $passaro->comunica().'<br>';
echo $passaro->mover();











