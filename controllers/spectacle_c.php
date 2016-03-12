<?php

class Spectacle{

    private $instanceModelSpectacle;
    private $instanceHelperDate;

    public function __construct()
    {
        include("models/spectacle_m.php");
        $this->instanceModelSpectacle = new Spectacle_m();
      //  $this->instanceHelperDate = new Helper_date();
    }
    public function index()
    {
        include("views/v_head.php");
        include('views/v_menu.php');
        include("views/v_principale.php");
        include("views/v_foot.php");
    }

    public function afficherTousSpectacles(){
        include("views/v_head.php");
        include("views/v_menu.php");
        $data = $this->instanceModelSpectacle -> getAllSpectacles();
        include("views/v_affiche_spectacle.php");
        include("views/v_foot.php");
    }

    public function supprimerSpectacle($id=''){
        $this->instanceModelSpectacle->deleteSpectacle($id);
        $this->afficherTousSpectacles();
    }

    public function ajouterSpectacle()
    {
        include("views/v_head.php");
        include("views/v_menu.php");
        $nomTheatre = $this->instanceModelSpectacle->dropDownNomTheatre();
        include("views/v_ajouter_spectacle.php");
        include("views/v_foot.php");
    }

    public function verifAddSpect(){

        $donnees = $this->instanceModelSpectacle->validAddSpect();
    }


    public function modifierSpectacle($id=''){

        if(isset($_POST['nom']) && isset($_POST['date_representation']) && isset($_POST['prix'])  && isset($_POST['id_theatre'])){
            $this->verifModifSpect($id);
        }else{
            include("views/v_head.php");
            include("views/v_menu.php");
            $nomTheatre = $this->instanceModelSpectacle->dropDownNomTheatre();
            $donnees=$this->instanceModelSpectacle->readSpectacle($id);
            include("views/v_modifier_spectacle.php");
            include("views/v_foot.php");
        }
    }

    public function verifModifSpect($id){
        $this->instanceModelSpectacle->validUpdSpect($id);
    }

}