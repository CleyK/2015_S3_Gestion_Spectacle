<?php

class Spectacle_m{

    private $base;

    public function __construct(){
        $maConnexion= new Connexion();
        $this->base=$maConnexion->connect();
       // var_dump($this->base);
    }

    public function getAllSpectacles(){
        $requete = "select spectacle.id_spectacle, spectacle.nom, spectacle.date_representation,
        spectacle.prix, theatre.nom_theatre
        from spectacle join theatre
        on spectacle.id_theatre = theatre.id_theatre";
        $select = $this->base->query($requete);
        $result = $select->fetchAll();
        return $result;

    }

    public function readSpectacle($id){
        $requete="SELECT*FROM spectacle JOIN theatre
         ON spectacle.id_theatre = theatre.id_theatre
         WHERE id_spectacle='".$id."'";
        $select = $this->base->query($requete);
        $result=$select -> fetch();
        return $result;
    }

    public function deleteSpectacle($id){
        $requete = "DELETE FROM spectacle WHERE id_spectacle='".$id."'";
        $result = $this->base->exec($requete);
    }

    public function addSpectacle($donnees){
        $requete = "INSERT INTO spectacle VALUES
        (NULL,'".$donnees['nom']."',
        '".$donnees['date_representation']."','".$donnees['prix']."',
        '".$donnees['id_theatre']."')";
        var_dump($requete);
        $result = $this->base->exec($requete);

    }

    public function updateSpectacle($id, $donnees){
        $requete = "UPDATE spectacle SET
        spectacle.nom='".$donnees['nom']."',spectacle.date_representation = '".$donnees['date_representation']."',
        spectacle.prix='".$donnees['prix']."',spectacle.id_theatre='".$donnees['id_theatre']."'
         where spectacle.id_spectacle='".$id."'";
        $result = $this->base->exec($requete);

        return $result;

    }


    //listes déroulantes

    public function dropDownNomTheatre(){
        $requete = "SELECT nom_theatre, id_theatre FROM theatre ORDER BY nom_theatre;";
        $select = $this->base->query($requete);
        $result = $select->fetchAll();

        $liste_NomTheatre = array();
        if(count($result) > 0){
            $liste_NomTheatre[''] = 'Sélectionner un théâtre';
            foreach($result as $row){
                $liste_NomTheatre[$row['id_theatre']] = $row['nom_theatre'];
            }
        }
        return $liste_NomTheatre;
    }


    //fonctions de vérifications

    public function validAddSpect(){
        $erreurs=array();

      //  $donnees['id_spectacle']=htmlentities($_POST['id_spectacle']);
        $donnees['nom']=htmlentities($_POST['nom']);
        $donnees['date_representation']=htmlentities($_POST['date_representation']);
        $donnees['prix']=htmlentities($_POST['prix']);
        $donnees['id_theatre']=htmlentities($_POST['id_theatre']);

/*       if(! ctype_digit($donnees['id_spectacle']))
            $erreurs['id_spectacle']='veuillez saisir un entier';
        elseif (!$this->instanceModelSpectacle->verif_id_type($donnees['id_spectacle']))
            $erreurs['id_spectacle']='Saisir une valeur numérique qui existe';
*/
        if (!preg_match("/[A-Za-z]{2,}/",$donnees['nom']))
            $erreurs['nom']='le nom composé uniquement de lettres';

        if(!preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $donnees['date_representation'])){
            $erreurs['date_representation'] = "Veuillez entrer une date sous format YYYY-MM-JJ";
        }

        if(! is_numeric($donnees['prix']))
            $erreurs['prix']='veuillez saisir une valeur numérique';

       /* if (!preg_match("/[A-Za-z]{2,}/",$donnees['nom_theatre']))
            $erreurs['nom_theatre']='nom composé uniquement de lettres ou
            ne correspond à aucun théatre';
*/
    /*    if(! ctype_digit($donnees['id_theatre']))
            $erreurs['id_spectacle']='veuillez saisir un entier';
        elseif (!$this->instanceModelSpectacle->verif_id_type($donnees['id_theatre']))
            $erreurs['id_theatre']='Saisir une valeur numérique qui existe';
*/
        if(!empty($erreurs))
        {

            include("views/v_head.php");
            include("views/v_menu.php");
            $nomTheatre = $this->dropDownNomTheatre();
            include("views/v_ajouter_spectacle.php");
            include("views/v_foot.php");
        }
        else
        {

            $this->addSpectacle($donnees);

            header("Location: ".BASE_URL."index.php/Spectacle/afficherTousSpectacles");

        }
    }

    public function validUpdSpect($id='')
    {
        $erreurs=array();

        $donnees['nom']=htmlentities($_POST['nom']);
        $donnees['date_representation']=htmlentities($_POST['date_representation']);
        $donnees['prix']=htmlentities($_POST['prix']);
        $donnees['id_theatre']=htmlentities($_POST['id_theatre']);

         if (!preg_match("/[A-Za-z]{2,}/",$donnees['nom']))
            $erreurs['nom']='le nom composé uniquement de lettres';

        if(!preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $donnees['date_representation'])){
            $erreurs['date_representation'] = "Veuillez entrer une date sous format YYYY-MM-JJ";
        }

        if(! is_numeric($donnees['prix'])){
            $erreurs['prix']='veuillez saisir une valeur numérique';
        }

       /* if (!preg_match("/[A-Za-z]{2,}/",$donnees['nom_theatre']))
            $erreurs['nom_theatre']='nom composé uniquement de lettres ou
            ne correspond à aucun théatre';*/

        if(! empty($erreurs))
        {

            include("views/v_head.php");
            include("views/v_menu.php");
            $nomTheatre = $this->dropDownNomTheatre();
            include("views/v_modifier_spectacle.php");
            include("views/v_foot.php");
        }
        else
        {
          $this->updateSpectacle($id, $donnees);

          header("Location: ".BASE_URL."index.php/Spectacle/afficherTousSpectacles");
        }
    }


}
$show=new Spectacle_m();


