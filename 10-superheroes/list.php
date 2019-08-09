<?php       

/**
 * Reprendre le header (doctype jusque <body>) de create.php et l'ajouter dans un fichier partials/header.php
 * Reprendre le footer (de <script> à </html>) de create et l'ajouter dans un fichier partials/footer.php
 * 
 * Dans le fichier list.php inclure le header et inclure le footer.
 * Entre le header et le footer on creera un tableau html avec Bootstrap.Dans ce tableau on affiche la liste des super héros présent dans la base de données.
 * 
 * Une fois le fichier list.php terminé, on ajoutera une navbar dans le partials/header.php. La navbar permettra de naviguer entre la page list.php (les héros) et la page create.php (crrer un héros). Il faudra bien inclure le header et footer dans create.php
 */
require_once 'config/autoload.php';

//Récuperer les héros
$q = Database::get()->query ("SELECT id, name, power, identity, universe FROM superheroe");
    
$q->execute();

$superHeroes = $q->fetchAll(PDO::FETCH_OBJ);


include 'partials/header.php';?>

    <div class="container mt-5">
        <table class="table shadow p-3 mb-5 bg-white rounded">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Pouvoir</th>
                    <th scope="col">Identité</th>
                    <th scope="col">Univers</th>
                    <th scope="col">Ennemis</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($superHeroes as $superHeroe) {
                    $enemies = Database::get()->query('SELECT * FROM superheroe sh
                    INNER JOIN superheroe_has_supernaughty shs ON shs.superheroe_id = sh.id
                    INNER JOIN supernaughty sn ON shs.supernaughty_id = sn.id
                    WHERE sh.id = '.$superHeroe->id)->fetchAll(PDO::FETCH_OBJ);

                    // On récupère les ennemis du super héros
                    $enemies = Database::get()->query(
                       'SELECT * FROM superheroe sh
                        INNER JOIN superheroe_has_supernaughty shs ON shs.superheroe_id = sh.id
                        INNER JOIN supernaughty sn ON shs.supernaughty_id = sn.id
                        WHERE sh.id = '.$superHeroe->id)->fetchAll(PDO::FETCH_OBJ);
            ?>
                    <tr>
                        <th scope="row"><?=$superHeroe->id ?></th>
                        <td>photo</td>
                        <td><?= $superHeroe->name ?></td>
                        <td><?= $superHeroe->power ?></td>
                        <td><?=$superHeroe->identity ?></td>
                        <td><?=$superHeroe->universe ?></td>
                        <td><?php foreach ($enemies as $enemy) {echo $enemy->name.', ';} ?></td>
                        <td>
                            <a href="" class="btn btn-secondary">Révéler</a>
                            <a href="./edit.php?id=<?= $superHeroe->id ?>" class="btn btn-primary">Modifier</a>
                            <a href="./delete.php?id=<?= $superHeroe->id ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    
<?php include 'partials/footer.php';?>
