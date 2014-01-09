
<div class="container">
<h1>Ajouter un ingredient :</h1>

<?php
echo $this->Form->create('Ingredient', array('type' => 'file'));
echo $this->Form->input('nom');
echo $this->Form->input('pays');
echo $this->Form->input('region');
echo $this->Form->input('description', array('rows' => '3'));

$regime = array('Leger' => 'Léger', 'Moyen' => 'Moyen', 'Gourmand' => 'Gourmand');

echo $this->Form->input('regime', array(
      'options' => $regime,
      'empty' => '(choisissez)'
  ));
//echo $this->Form->input('regime');
echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
echo $this->Form->end();
//print_r($plats); ?>

