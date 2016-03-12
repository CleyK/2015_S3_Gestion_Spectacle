<?php

class Theatre_m{

    private $base;

    public function __construct(){
        $maConnexion= new Connexion();
        $this->base=$maConnexion->connect();
        // var_dump($this->base);
    }

    public function getAllTheatres(){
        $requete = "select*from theatre";
        $select = $this->base->query($requete);
        $result=$select->fetchAll();
        return $result;
    }





}