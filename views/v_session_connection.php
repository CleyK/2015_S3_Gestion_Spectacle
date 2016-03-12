



<?php if(isset($_SESSION['droit']) and isset($_SESSION['login'])): ?>
    <div id="login_boite" style="color:blue">
        Bonjour <?= $_SESSION['login'];?> &nbsp;
        <a href="<?php echo BASE_URL;?>index.php/Session/afficheConnexion">deconnexion</a>
    </div>

<?php else: ?>
    <div id="login_boite" style="color:green ">
        <form method="post" action="<?php echo BASE_URL;?>index.php/Session/afficheConnexion">
            <fieldset>
               <label>Identifiant
                    <input name="login_utilisateur"  type="text"  size="18" />
               </label>

               <label>Mot de passe
                    <input name="password_utilisateur" type="passwd" size="18" />

               </label>

               <input type="submit" name="sessions_connexion" value="connexion" />

            </fieldset>
            <p id="erreur" style="color:red"><?php if(isset($_SESSION['erreur'])) echo $_SESSION['erreur'];?></p>
        </form>
    </div>
<?php endif; ?>