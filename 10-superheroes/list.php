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

//Connexion BDD
$db = new PDO('mysql:host=localhost;dbname=superheroes;charset=utf8', 'root','',[PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING]);

//Récuperer les héros
$q = $db->prepare ("SELECT id, name, power, identity, universe FROM superheroe");
    
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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($superHeroes as $superHeroe): ?>
                    <tr>
                        <th scope="row"><?=$superHeroe->id ?></th>
                        <td>photo</td>
                        <td><?= $superHeroe->name ?></td>
                        <td><?= $superHeroe->power ?></td>
                        <td><?=$superHeroe->identity ?></td>
                        <td><?=$superHeroe->universe ?></td>
                        <td>
                            <a href="" class="btn btn-secondary">Révéler</a>
                            <a href="" class="btn btn-primary">Modifier</a>
                            <a href="" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
<?php include 'partials/footer.php';?>
