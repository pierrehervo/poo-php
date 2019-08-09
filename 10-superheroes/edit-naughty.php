<?php include 'partials/header.php';
require_once 'config/autoload.php';
?>
        
            <?php 
            /**
             * Récupere l'id
             */
            $id = $_GET['id'] ??  null;

            //Réccupere les info des données de l'id selectionné dans le form
            $superNaughty = SuperNaughty::find($id);


            
            // ICI je MODIFIE les données du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                // On hydrate une instance de SuperHeroe
                //$superHeroe = new SuperHeroe();
                $superNaughty->hydrate($_POST); // On hydrate l'objet avec les données du formulaire
                // Vérification des données...
                // Si la requête SQL a réussi
                if ($superNaughty->update($id)) {
                    echo '<div class="alert alert-success">Le vilain a été modifié</div>';
                }
            } 
            ?>
            <div class="container">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nom du Vilain</label>
                    <input type="text" value="<?=$superNaughty->name?>" name="name" class="form-control" placeholder="" id="name">
                </div>

                <div class="form-group">
                    <label for="hobby">Hobby</label>
                    <input type="text" name="hobby" value="<?=$superNaughty->hobby?>" class="form-control" placeholder="" id="power">
                </div>

                <div class="form-group">
                    <label for="identity">L'identité du Vilain</label>
                    <input type="text" name="identity" value="<?=$superNaughty->identity?>" class="form-control"  id="identity">
                </div>
                <div class="form-group">
                    <label for="universe">Univers</label>
                    <select class="form-control" name="universe" id="universe">
                        <option value="Marvel" <?= ($superNaughty->universe === 'Marvel') ? 'selected' : '';?>>Marvel</option>
                        <option value="DC" <?= ($superNaughty->universe === 'DC') ? 'selected' : '';?> >DC</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Modifier </button>
            </form>
            </div>


        <?php include 'partials/footer.php';?> 