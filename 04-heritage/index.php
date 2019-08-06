<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>POO: Héritage</title>
    </head>
    <body>
        <?php 
        require_once 'Character.php';
        require_once 'Game.php';
        require_once 'Warrior.php';
        require_once 'Hunter.php';
        require_once 'Magus.php';

            //On peut crer une partie
            $game = new Game ();

            //On crée les personnages
            $aragorn = new Warrior ('Aragorn');
            $legolas = new Hunter('Legolas');
            $gandalf = new Magus ('Gandalf');

            //On ajoute dse personnages dans le jeu
            $game
                ->addPlayer($aragorn)
                ->addPlayer($legolas)
                ->addPlayer($gandalf)
            ;
        
            var_dump($game);

            $aragorn->attack($legolas); //Enle x pdv en fonction de force
            $legolas->rangedAttack($gandalf);//Enlève x pdv en fonction de la force *3
            $gandalf->castSpell($aragorn); //Enleve x pdv en fonction de mana
            $legolas->attack($gandalf);

            var_dump($game);
        ?>
    </body>
</html>