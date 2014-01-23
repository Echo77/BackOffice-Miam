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
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => "Un pays d'ingredient est requis"
                ),
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "Le pays indiqué est trop long"
                )              
        ),
        'description' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => "Une description d'ingredient est requis"
                ),
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "La description indiquée est trop longue"
                )
            
        ),
    );
}
    ?>