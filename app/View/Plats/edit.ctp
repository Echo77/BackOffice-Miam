
<div class="container">
<h1>Modifier un plat</h1>

<div class="row">
	<div class="span6">
<?php
echo $this->Form->create('Plat', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('Plat.nom');
echo $this->Form->input('Plat.prix');
echo $this->Form->input('Plat.description', array('rows' => '3'));

$categorie = array('Salade' => 'Salade', 'Entree froide' => 'Entrée froide', 'Entree chaude' => 'Entrée Chaude', 'Beignet' => 'Beignet', 'Assiette' => 'Assiette', 'Boisson');

echo $this->Form->input('categorie', array(
      'options' => $categorie,
      'empty' => '(choisissez)'
  ));
echo $this->Form->input('calorie');
?>
	</div>
	<div class="span4">
<?php
	echo "<p>";
	echo $this->Html->image($picture, array('max-width'=>'90%', 'max-height'=>'80%'));
	echo "</p>";


echo $this->Form->input('Plat.photo', array(
    'between' => '<br />',
    'type' => 'file'
));

?>
	</div>
</div>
<h2> Choix des ingrédients </h2>

<?php
foreach($ingredients as $ingre => $key) {
  	echo $this->Form->input('IngredientPlat.'.$ingre.'', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>$key["Ingredient"]["nom"], 'value' => $key["Ingredient"]["id"] ));
  	//echo $this->Form->checkbox(array('value' => $key2["id"]));
    //echo $key2["nom"];
}
echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
echo $this->Form->end();
?>