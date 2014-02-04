
<div class="container">
<h1>Ajouter un ingrédient :</h1>

<?php
	echo $this->Form->create('Ingredient', array('type' => 'file'));
	echo $this->Form->input('nom');
	echo $this->Form->input('pays');
?>
<div style="display: flex">

	<ul style="width:25%;">
	<?php  echo $this->Form->input('Ingredient.regime.0', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Gluten", 'value' => "Gluten"));
	echo $this->Form->input('Ingredient.regime.1', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Lactose", 'value' => "Lactose"));  
	echo $this->Form->input('Ingredient.regime.2', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Drupacées", 'value' => "Drupacées")); 
	echo $this->Form->input('Ingredient.regime.3', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Ombellifères", 'value' => "Ombellifères")); 
	echo $this->Form->input('Ingredient.regime.4', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Œuf", 'value' => "Œuf")); ?>
	</ul>
	<ul style="width:25%;">
	<?php
	echo $this->Form->input('Ingredient.regime.5', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Crustacés", 'value' => "Crustacés")); 
	echo $this->Form->input('Ingredient.regime.6', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Poisson", 'value' => "Poisson")); 
	echo $this->Form->input('Ingredient.regime.7', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Lait", 'value' => "Lait")); 
	echo $this->Form->input('Ingredient.regime.8', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Blé", 'value' => "Blé")); 
	echo $this->Form->input('Ingredient.regime.9', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Légumineuses", 'value' => "Légumineuses")); ?>
	</ul>
	<ul style="width:25%;">
	<?php
	echo $this->Form->input('Ingredient.regime.10', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Banane ", 'value' => "Banane "));
	echo $this->Form->input('Ingredient.regime.11', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Avocat", 'value' => "Avocat"));
	echo $this->Form->input('Ingredient.regime.12', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Kiwi", 'value' => "Kiwi")); 
	echo $this->Form->input('Ingredient.regime.13', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Moules", 'value' => "Moules"));  
	echo $this->Form->input('Ingredient.regime.14', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Pommes de terre ", 'value' => "Pommes de terre ")); ?>
	</ul>
	<ul style="width:25%;">
	<?php
	echo $this->Form->input('Ingredient.regime.15', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Tournesol", 'value' => "Tournesol")); 
	echo $this->Form->input('Ingredient.regime.16', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Bœuf", 'value' => "Bœuf")); 
	echo $this->Form->input('rIngredient.regime.17', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Arachide", 'value' => "Arachide"));
	echo $this->Form->input('Ingredient.regime.18', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>"Mangue", 'value' => "Mangue")); ?>
	</ul>
 </div>
<?php
/* supprimé pour le moment
	$regime = array('Leger' => 'Léger', 'Moyen' => 'Moyen', 'Gourmand' => 'Gourmand');

	echo $this->Form->input('regime', array(
	      'options' => $regime,
	      'empty' => '(choisissez)'
	  )); */

	echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
	echo $this->Form->end();
?>

