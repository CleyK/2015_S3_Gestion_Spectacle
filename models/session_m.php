<?php

class Session_m{

    public $db = NULL;

    public function __construct(){
        $this->db= Connexion::connect();
    }

    function verif_login_mdp_Utilisateur($login,$mdp){
        $requete="SELECT login,motdepasse,droit FROM utilisateur WHERE motdepasse='".$mdp."' and login='".$login."';";
       // echo $requete;
        $select = $this->db->query($requete);
        $select->setFetchMode(PDO::FETCH_ASSOC);
        if($select->rowCount()==1){
            $enregistrements = $select->fetchAll();
            return $enregistrements;
        }
        else
            return false;
    }


} 