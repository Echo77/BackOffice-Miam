<?php
    class Plat extends AppModel {
    var $name = 'Plat';
   
    var $hasAndBelongsToMany = array(
        'Ingredient' =>
            array(
                'className'              => 'Ingredient',
                'joinTable'              => 'ingredients_plats',
                'foreignKey'             => 'plat_id',
                'associationForeignKey'  => 'ingredient_id',
                'with' => 'IngredientsPlat'
            ),
        'Menu' =>
            array(
                'className'              => 'Menu',
                'joinTable'              => 'menus_plats',
                'foreignKey'             => 'plat_id',
                'associationForeignKey'  => 'menu_id',
                'with' => 'MenusPlat'
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
        ),
        'photo' => array(
            'rule' => array(
                'extension',
                array('gif', 'jpeg', 'png', 'jpg')
            ),
            'message' => 'Joindre une photo',
            'allowEmpty' => TRUE
        )
    );
}
    ?>