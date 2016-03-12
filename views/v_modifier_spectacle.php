
<form method="post" action="<?php echo BASE_URL?>index.php/Spectacle/verifModifSpect/<?=$donnees['id_spectacle']?>">
    <div class="row">

        <fieldset>
            <legend>Modifier un spectacle</legend>

            <label>Nom
                <input name="nom"  type="text"  size="18"   value="<?php if(isset($donnees['nom'])) echo $donnees['nom']; ?>"/>
                <?php if(isset($erreurs['nom'])) echo '<small class="error">'.$erreurs['nom'].'</small>'; ?>
            </label>

            <label>Date de projection
                <input name="date_representation"  type="text"  size="10"   value="<?php if(isset($donnees['date_representation'])) echo $donnees['date_representation']; ?>"/>
                <?php if(isset($erreurs['date_representation'])) echo '<small class="error">'.$erreurs['date_representation'].'</small>'; ?>

            </label>

            <label>Prix
                <input name="prix"  type="text"  size="18"   value="<?php if(isset($donnees['prix'])) echo $donnees['prix']; ?>"/>
                <?php if(isset($erreurs['prix'])) echo '<small class="error">'.$erreurs['prix'].'</small>'; ?>

            </label>
            <label>Nom du théâtre en charge
                <select name="id_theatre">
                    <?php foreach($nomTheatre  as $key=>$value) : ?>
                        <option value="<?php echo $key; ?>"
                            <?php if(isset($donnees['id_theatre'])  and $donnees['id_theatre']==$key): ?> selected="selected" <?php endif; ?>>
                            <?php echo $value; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </label>
            <?php if(isset($erreurs['id_theatre'])) echo '<small class="error">'.$erreurs['id_theatre'].'</small>'; ?>


            <input type="submit" name="modifierSpectacle" value="Modifier" />

        </fieldset>
    </div>
</form>