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
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => "Un nom de plat est requis"
                ),
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "Le nom indiqué est trop long"
                )    
        ),
        'prix' => array(
            'rule' => 'numeric',
            'message' => "Le prix du plat est requis"
        ),
        'regime' => array(
            'rule' => 'notEmpty',
            'message' => "Le type de régime du plat est requis"
        ),
        'categorie' => array(
            'rule' => 'notEmpty',
            'message' => "La catégorie du plat est requise"
        ),
        'description' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => "Une description de plat est requise"
                ),
            'length' => array(
                'rule' => array('maxLength', 255),
                'message' => "La description indiquée est trop longue"
                )    
        ),
        'photo' => array(
            'rule' => array(
                'extension',
                array('gif', 'jpeg', 'png', 'jpg')
            ),
            'message' => "Joindre une photo",
            'allowEmpty' => TRUE
        )
    );
}
    ?>