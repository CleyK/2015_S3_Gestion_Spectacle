<?php

class  Theatre{

    private $instanceModelTheatre;

    public function __construct()
    {
        include("models/theatre_m.php");
        $this->instanceModelTheatre = new Theatre_m();
    }

    public function afficherTousTheatres(){
        include("views/v_head.php");
        include("views/v_menu.php");
        $data = $this->instanceModelTheatre -> getAllTheatres();
        include("views/v_affiche_theatre.php");
        include("views/v_foot.php");
    }


}