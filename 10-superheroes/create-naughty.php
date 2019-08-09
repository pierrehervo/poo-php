<?php require_once 'config/autoload.php' ?>
<?php include 'partials/header.php' ?>

        <div class="container">
        <?php
            if ( $_SERVER['REQUEST_METHOD'] === "POST")//Traitement du formulaire
            {
                require_once 'SuperNaughty.php';
                //On récupere les données du formulaire
                //On hydrate une instance SuperHeroe
                $superNaughty= new SuperNaughty();
                $superNaughty->hydrate($_POST);//On hydrate l'objet avec les données du formulaire

                //Vérification des données 

                if ($superNaughty->save()){
                    echo '<div class="alert alert-succes">Le vilain a été ajouté</div>';
                }

            }

        ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom de Super Vilain">
                </div>
                <div class="form-group">
                    <label for="hobby">Hobby:</label>
                    <input type="text" name="hobby" id="hobby" class="form-control" placeholder="Votre méfait préferé">
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
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>


        <?php   include 'partials/footer.php';?>