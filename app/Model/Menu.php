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
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => "Un nom d'ingredient est requis"
                ),
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "Le nom indiqué est trop long"
                )    
        ),
        'prix' => array(
            'rule' => array('numeric', 'notEmpty'),
            'message' => "Un prix de menu est requis"
        ),
        'description' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => "Une description d'ingredient est requise"
                ),
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "La description indiquée est trop longue"
                )    
        ),
    );
}
    ?>