<?php include 'partials/header.php';
require_once 'config/autoload.php';
?>
        
            <?php 
            /**
             * Récupere l'id
             */
            $id = $_GET['id'] ??  null;

            //Réccupere les info des données de l'id selectionné dans le form
            $q = Database::get()->prepare('SELECT * FROM superheroe WHERE id = :id');  
            $q->bindValue('id', $id);
            $q->execute();
            //$superHeroe = $q->fetch(PDO::FETCH_OBJ);
            
            // Le setFetchMode ici permet de retourner une instance de SuperHeroe avec fetch plutôt qu'une instance de StdClass
            $q->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, SuperHeroe::class);
            $superHeroe = $q->fetch(); // le fetch fait un new SuperHeroe(); grâce à PDO::FETCH_CLASS
            //var_dump($superHeroe);


            
            // ICI je MODIFIE les données du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                // On hydrate une instance de SuperHeroe
                //$superHeroe = new SuperHeroe();
                $superHeroe->hydrate($_POST); // On hydrate l'objet avec les données du formulaire
                // Vérification des données...
                // Si la requête SQL a réussi
                if ($superHeroe->update($id)) {
                    echo '<div class="alert alert-success">Le héros a été modifié</div>';
                }
            } 
            ?>
            <div class="container">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nom du Héro</label>
                    <input type="text" value="<?=$superHeroe->name?>" name="name" class="form-control" placeholder="" id="name">
                </div>

                <div class="form-group">
                    <label for="power">Pouvoir du Héro</label>
                    <input type="text" name="power" value="<?=$superHeroe->power?>" class="form-control" placeholder="" id="power">
                </div>

                <div class="form-group">
                    <label for="identity">L'identité du Héro</label>
                    <input type="text" name="identity" value="<?=$superHeroe->identity?>" class="form-control"  id="identity">
                </div>
                <div class="form-group">
                    <label for="universe">Pouvoir du Héro</label>
                    <select class="form-control" name="universe" id="universe">
                        <option value="Marvel" <?= ($superHeroe->universe === 'Marvel') ? 'selected' : '';?>>Marvel</option>
                        <option value="DC" <?= ($superHeroe->universe === 'DC') ? 'selected' : '';?> >DC</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Modifier </button>
            </form>
            </div>


        <?php include 'partials/footer.php';?> 