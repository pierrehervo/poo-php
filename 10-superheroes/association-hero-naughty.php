<?php
require_once 'config/autoload.php';
require_once 'partials/header.php';
require_once 'Database.php';

//Récuperer les héros
$q = Database::get()->query ("SELECT id, name, power, identity, universe FROM superheroe");
    
$q->execute();

$superHeroes = $q->fetchAll(PDO::FETCH_OBJ);

//Récupérer les vilains
$superNaughtys = SuperNaughty::findAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $heroe = $_POST['superHeroe'];
    $naughty = $_POST['superNaughty'];

    $q = $q = Database::get()->prepare ("INSERT INTO superheroe_has_supernaughty (`superheroe_id`,`supernaughty_id`) VALUES (`:superheroe_id`,`:supernaughty_id`)");

        $q->bindValue('superheroe_id', $heroe);
        $q->bindValue('supernaughty_id', $naughty);
        $q->execute();

        $superHeroes = $q->fetchAll(PDO::FETCH_OBJ);
}
?>

<!-- 
    Créer un formulaire avec deux Select
    Le premier propose la liste de tous les héros de la base de données 
    Le second propose la liste des supers vilains
 -->
            <form action="" method="post">
                <div class="form-group">      
                    <label for="superHeroe">Tous les Supers-Héros</label>
                    <select id="superHeroe" name="superHeroe" class="form-control">
                        <?php foreach($superHeroes as $superHeroe): ?>
                        <option value="<?=$superHeroes->id?>"><?= $superHeroe->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">           
                    <label for="superNaughty">Tous les Supers-Vilains</label>
                    <select id="superNaughty" name="superNaughty" class="form-control">
                        <?php foreach($superNaughtys as $superNaughty): ?>
                        <option value="<?=$superNaughty->id?>"><?= $superNaughty->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Associer</button>
            </form>
            

<?php require_once 'partials/footer.php'; ?>

