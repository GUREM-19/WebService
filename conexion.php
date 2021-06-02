<?php
//CONEXION A BASE DE DATOS
class Conexion extends PDO{
    private $host = 'localhost' ;
    private $database = 'proyecto' ;
    private $user = 'root' ;
    private $psswrd = '' ;

    public function __construct(){
        try{
            parent::__construct('mysql:hosdbt=' . $this->host .';dbase=' . $this->
             database . ';charset=utf8', $this->user, $this->psswrd, array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(PDOException $ex){
            echo 'Error: ' . $ex->getMessage();
            exit;
        }
    }

}

?>