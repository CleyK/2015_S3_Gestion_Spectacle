<?php

class P_principale {


    private $instanceModelSpectacle;
    private $instanceModelTheatre;

    public function __construct()
    {
        include("models/spectacle_m.php");
        $this->instanceModelSpectacle = new Spectacle_m();
        $this->instanceModelTheatre = new Theatre_m();
    }

    public function index()
    {
        include("views/v_head.php");
        include('views/v_menu.php');
        include("views/v_principale.php");
        include("views/v_foot.php");
    }


    public function envoyerSpectacle(){

    }

    public function envoyerTheatre(){

    }
} 