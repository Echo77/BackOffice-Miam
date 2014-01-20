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
            )
    );
    public $validate = array(
        'nom' => array(
            'rule' => 'notEmpty',
            'message' => 'Le nom du plat est requis'
        ),
        'prix' => array(
            'rule' => 'notEmpty',
            'message' => 'Le prix du plat est requis'
        ),
        'regime' => array(
            'rule' => 'notEmpty',
            'message' => 'Le type de régime du plat est requis'
        ),
        'categorie' => array(
            'rule' => 'notEmpty',
            'message' => 'La catégorie du plat est requise'
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