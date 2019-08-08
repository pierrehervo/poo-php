<?php
/**
 * Cette classe permet de créer un formulaire pour un site web0
 */
class Form
{
    /**
     * Represente les champs de notre formulaire 
     *
     * @var array
     */
    private $fields = [];

    /**
     * Définit le label du bouton sur le formulaire
     */
    private $button;


    public function input($name)
    {
        // On ajoute le champ
        $this->fields[] = [
            'name' => $name,//Nom du champ
            'tag' => 'input', //Balise html du champ
        ];
        return $this;
    }

    public function button($name)
    {
        $this->button = $name;
    }

    public function textarea($name)
    {
        $this->fields[] = [
            'name' => $name,
            'tag' => 'textarea', 
        ];
        return $this;
    }

    public function select($name, $options)
    {
        $this->fields[] = [
            'name' => $name,
            'tag' => 'select', 
            'options' => $options, //Options du select
        ];
        return $this;
    }

    /**
     * __toString permet de définir ce qu'on affiche quand on echo l'objet.
     *On affiche le formulaire en HTML
     * @return string
     */
    public function __toString()
    {
        //On génére le rendu du formulaire
        $html = '<form method="post">';
        //Parcourir tous les champs et les ajouter dans la variable html
        foreach ($this->fields as $field) {
            $html .='<div class="form-group">';
            $html .='<label>'.$field['name'].'</label>';

            //On récupère les valeurs des champs
            //Si le champ a été soumis on récupére sa valeur sinon sa valeur est null
            $data = $this->getData($field['name']) ?? null;
            
            if ($field['tag'] === 'input'){//Si le champ de l'itération actuelle est un input
             $html .='<input value="'.$data.'" type ="text" name="'.$field['name'].'" class="form-control">';
            }else if ($field['tag'] === 'textarea'){
                $html .='<textarea name="'.$field['name'].'" class="form-control">'.$data.'</textarea>';
            }else if ($field['tag'] === 'select'){
                $html .='<select name="'.$field['name'].'" class="form-control">';
                //Parcourir toutes les options du champ select et les afficher dans les balise <option>
                foreach ($field['options'] as $option) {
                    $html .='<option value="'.$option.'">'.$option.'</option>';
                }
                $html .='</select>';
            }

            $html .='</div>';
        }

        //Afficher le bouton dans le html
        $html .= '<button class="btn btn-primary btn-block">'.$this->button.'</button>';

        $html .='</form>';
        return $html;
    }

    //Vérifie si le formulaire est soumis
    public function isSubmit()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    //Recupere les donnees du formulaire
    //On peut récuperer une seule donnée si on le souhaite
    //Par exxemple: $this->getData('email') renvoie $_POST['email]
     public function getData($key = null)
     {
         if ($key !== null) {
             return $_POST[$key] ?? null;
         }
         return $_POST;
     }
}