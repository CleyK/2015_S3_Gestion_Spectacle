<div class="row">
    <table>
        <caption>Liste des théâtres</caption>

        <thead>
        <tr>
            <th>nom du théâtre</th>
            <th>adresse </th>
            <th>numéro de téléphone</th>
        <!--    <th>Opération</th>
        </tr>-->
        </thead>

        <tbody>
        <?php foreach ($data as $value): ?>
    <tr><td>
            <?php echo($value['nom_theatre']); ?>
        </td><td>
            <?= $value['adr_theatre']; ?>
        </td><td>
            <?= $value['tel_theatre']; ?>
        </td>

      <!--  <td>

            <a href="<?php echo BASE_URL ?>index.php/Theatre/modifierTheatre/<?php echo $value['id_spectacle'];?>">modifier</a>

            <a href="<?php echo BASE_URL ?>index.php/Theatre/supprimerTheatre/<?php echo $value['id_spectacle'];?>"
               onclick="return confirm('Etes vous sûr de vouloir supprimer cette entrée ?')" >supprimer</a>
        </td>-->
    </tr>
<?php endforeach; ?>
<tbody>
</table>
</div>