<?php
    class Menu extends AppModel {
    var $name = 'Menu';
   
    var $hasAndBelongsToMany = array(
        'Plat' =>
            array(
                'className'              => 'Plat',
                'joinTable'              => 'menus_plats',
                'foreignKey'             => 'menu_id',
                'associationForeignKey'  => 'plat_id',
                'with' => 'MenusPlat'
            )
    );
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