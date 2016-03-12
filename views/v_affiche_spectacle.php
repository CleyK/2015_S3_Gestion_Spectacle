<div class="row">
    <table>
        <caption>Liste des spectacles</caption>

        <thead>
        <tr>
            <th>nom du spectacle</th>
            <th>date de projection</th>
            <th>prix</th>
            <th>nom du théâtre en charge</th>
            <th>Opération</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($data as $value): ?>
            <tr><td>
                    <?php echo($value['nom']); ?>
                </td><td>
                    <?= $value['date_representation']; ?>
                </td><td>
                    <?= $value['prix']; ?>
                </td><td>
                    <?= $value['nom_theatre']; ?>
                </td>
                <td>

                    <a href="<?php echo BASE_URL ?>index.php/Spectacle/modifierSpectacle/<?php echo $value['id_spectacle'];?>">modifier</a>

                    <a href="<?php echo BASE_URL ?>index.php/Spectacle/supprimerSpectacle/<?php echo $value['id_spectacle'];?>"
                       onclick="return confirm('Etes vous sûr de vouloir supprimer cette entrée ?')" >supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>