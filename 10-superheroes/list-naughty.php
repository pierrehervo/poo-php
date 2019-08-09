<?php

require_once 'config/autoload.php';


//Récupérer les vilains
$superNaughtys = SuperNaughty::findAll();


include 'partials/header.php';?>

    <div class="container mt-5">
        <table class="table shadow p-3 mb-5 bg-white rounded">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Hobby</th>
                    <th scope="col">Identité</th>
                    <th scope="col">Univers</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($superNaughtys as $superNaughty): ?>
                    <tr>
                        <th scope="row"><?=$superNaughty->id ?></th>
                        <td>photo</td>
                        <td><?= $superNaughty->name ?></td>
                        <td><?= $superNaughty->hobby ?></td>
                        <td><?=$superNaughty->identity ?></td>
                        <td><?=$superNaughty->universe ?></td>
                        <td>
                            <a href="" class="btn btn-secondary">Révéler</a>
                            <a href="./edit-naughty.php?id=<?= $superNaughty->id ?>" class="btn btn-primary">Modifier</a>
                            <a href="./delete-naughty.php?id=<?= $superNaughty->id ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
<?php include 'partials/footer.php';?>