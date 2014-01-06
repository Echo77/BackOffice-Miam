<?php
    class Plats extends AppModel {
    	
    public $belongsTo = array(
        'MesMenus' => array(
            'className' => 'Menus',
        )
    );	 	
    public $validate = array(
        'nom' => array(
            'rule' => 'notEmpty',
            'message' => 'Un nom de menu est requis'
        ),
        'prix' => array(
            'rule' => 'notEmpty',
            'message' => 'Un prix de menu est requis'
        ),
        'calorie' => array(
            'rule' => 'notEmpty',
            'message' => 'Un prix de menu est requis'
        ),
        'categorie' => array(
            'rule' => 'notEmpty',
            'message' => 'Un prix de menu est requis'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        )
    );
}
    ?>