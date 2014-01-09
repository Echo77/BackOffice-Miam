<?php
    class Menu extends AppModel {
    	 
    	 public $validate = array(
        'nom' => array(
            'rule' => 'notEmpty',
            'message' => 'Un nom de menu est requis'
        ),
        'prix' => array(
            'rule' => array('alphaNumeric', 'notEmpty'),
            'message' => 'Un prix de menu est requis'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        )
    );
}
    ?>