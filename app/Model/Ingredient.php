<?php
    class Ingredient extends AppModel {
    	 
    	 public $validate = array(
        'nom' => array(
            'rule' => 'notEmpty',
            'message' => 'Un nom d ingredient est requis'
        ),
        'pays' => array(
            'rule' => array('alphaNumeric', 'notEmpty'),
            'message' => 'Un pays de menu est requis'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        )
    );
}
    ?>