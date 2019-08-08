<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Formulaire de contact POO</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">    
    </head>
    <body>
        <div class="container">
            <?php
            require_once 'Form.php';
                //On crée un formulaire
                $form= new Form();

                //On configure le formulaire
                $form
                    ->input('email')
                    ->input('firstname')
                    ->input('telephone')
                    ->textarea('message')
                    ->select('status', ['Particulier','Professionnel'])
                    ->button('envoyer')
                ;
                echo $form;

                if($form->isSubmit()) {//Vérifier si le formulaire est soumis
                    var_dump($form->getData());//récuperer les données du formulaire
                }
            ?>
        </div>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
</html>