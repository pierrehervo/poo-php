<!-- 
    1) Integrer une nouvelle page HTML avec Bootstrap
    2) Ajouter un formulaire permettant de creer un super heros. Le formulaire contient les champs name power identity et universe (un select)
    3) Ajouter le traitement du formulaire: quand le formulaire est soumis on récupére les données dans $_POST. A partir des données on va creer une instance de SuperHeroe et hydrater celle-ci.
    Reprendre la requete SQL héros et on l'adapte pour pouvoir ajouter l'instance créée precedement.
 -->
   <?php include 'partials/header.php' ?>
        <div class="container">
        <?php
            if ( $_SERVER['REQUEST_METHOD'] === "POST")//Traitement du formulaire
            {
                require_once 'SuperHeroe.php';
                //On récupere les données du formulaire
                //On hydrate une instance SuperHeroe
                $superHeroe= new SuperHeroe();
                $superHeroe->hydrate($_POST);//On hydrate l'objet avec les données du formulaire

                //Vérification des données 

                if ($superHeroe->save()){
                    echo '<div class="alert alert-succes">Le héros a été ajouté</div>';
                }

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
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>

        <?php include 'partials/footer.php';?>
        

        