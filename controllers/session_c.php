<?php


class Session {

    private $instanceModelSession;

    public function __construct(){
        include("models/session_m.php");
        $this->instanceModelSession = new Session_m();
    }
    public function index()
    {

        include 'views/v_session_connection.php';
        echo "<br><br>tableau _SESSION :<br><pre>";
        print_r($_SESSION);
        echo "</pre>";
    }

    public function afficheConnexion(){

        include("views/v_head.php");
        include('views/v_menu.php');
        $this->connexionSession();
        include 'views/v_session_connection.php';
        include("views/v_foot.php");
    }

    public function connexionSession()
    {
        unset($_SESSION['droit']);
        unset($_SESSION['erreur']);
        unset($_SESSION['login']);
        $data=$this->instanceModelSession->verif_login_mdp_Utilisateur($_POST['login_utilisateur'],$_POST['password_utilisateur']);
        if($data != NULL)
        {
            $_SESSION['droit']=$data[0]['droit'];
            $_SESSION['login']=$data[0]['login'];


           // header("Location: ".BASE_URL."index.php/Spectacle/afficherTousSpectacles");
        }
        else
        {
            $_SESSION['erreur']='mot de passe ou login incorrect';
            include("views/v_head.php");
            include("views/v_menu.php");
            include("views/v_session_connection.php");
            include("views/v_foot.php");
        }
    }
    public function deconnexionSession()
    {
        unset($_SESSION['droit']);
        unset($_SESSION['erreur']);
        unset($_SESSION['login']);

        header("Location: ".BASE_URL."index.php");

    }

} 