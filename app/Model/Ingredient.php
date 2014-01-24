<?php
    class Ingredient extends AppModel {
    	 
    	 public $validate = array(
        'nom' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => "Un nom d'ingredient est requis"
                ),
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "Le nom indiqué est trop long"
                )
            
        ),
        'pays' => array(
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "Le pays indiqué est trop long"
                )              
        ),
    );
}
    ?>