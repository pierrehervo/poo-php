<?php include 'partials/header.php' ?>
        <div class="container">
        <?php
            //Connexion BDD
            $db = new PDO('mysql:host=localhost;dbname=superheroes;charset=utf8', 'root','',[PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING]);

            //Récuperer les héros
            $id = isset($_GET['id']) ? trim($_GET['id']) : null;
            $q = $db->prepare ("SELECT id, name, power, identity, universe FROM superheroe");
            $q->execute();

            if ( $_SERVER['REQUEST_METHOD'] === "POST")//Traitement du formulaire
            {
                $id = isset($_POST['id']) ? trim(htmlentities($_POST['id'])) : null;
                $id = isset($_POST['name']) ? trim(htmlentities($_POST['name'])) : null;
                $id = isset($_POST['power']) ? trim(htmlentities($_POST['power'])) : null;
                $id = isset($_POST['identity']) ? trim(htmlentities($_POST['identity'])) : null;
                $id = isset($_POST['universe']) ? trim(htmlentities($_POST['universe'])) : null;


                $sql = "UPDATE superheroe SET `name`=:name, `power`=:power, `identity`=:identity, `universe`=:universe WHERE `id`=:id";
                // Préparation de la requête
                $q = $db->prepare($sql);
                $q->bindParam(':id', $id);
                $q->bindParam(':name', $name);
                $q->bindParam(':power', $power);
                $q->bindParam(':identity', $identity);
                $q->bindParam(':universe', $universe);
                // Execution de la requete
                $q->execute();
                // Redirection de l'utilisateur vers la page de détail du film
                header("location: list.php?id=");
                exit;

                $superHeroes = $q->fetchAll(PDO::FETCH_OBJ);
            }
        ?>


            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom de Super Héros">
                </div>
                <div class="form-group">
                    <label for="power">Power:</label>
                    <input type="text" name="power" id="power" class="form-control" placeholder="Votre super pouvoir">
                </div>
                <div class="form-group">
                    <label for="identity">Identity:</label>
                    <input type="text" name="identity" id="identity" class="form-control" placeholder="Identité civile">
                </div>
                <div class="form-group">
                    <label for="universe">Universe</label>
                    <select id="universe" name="universe" class="form-control">
                        <option>Marvel</option>
                        <option>DC</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>

        <?php include 'partials/footer.php';?> 