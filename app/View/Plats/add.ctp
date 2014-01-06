
<div class="container">
<h1>Ajouter un menu</h1>

<?php
echo $this->Form->create('Plats');
echo $this->Form->input('nom');
echo $this->Form->input('prix');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('plats', array(
      'options' => array(1, 2, 3, 4, 5),
      'empty' => '(choisissez)'
  ));
echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
echo $this->Form->end();
print_r($plats); ?>

