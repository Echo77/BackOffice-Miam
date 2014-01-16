
<div class="container">
<h1>Ajouter un plat</h1>

<?php
echo $this->Form->create('Plat', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('Plat.nom');
echo $this->Form->input('Plat.prix');
echo $this->Form->input('Plat.description', array('rows' => '3'));

echo $this->Form->input('Plat.photo', array(
    'between' => '<br />',
    'type' => 'file'
));

$categorie = array('Salade' => 'Salade', 'Entree froide' => 'Entrée froide', 'Entree chaude' => 'Entrée Chaude', 'Beignet' => 'Beignet', 'Assiette' => 'Assiette', 'Boisson' => 'Boisson');

echo $this->Form->input('categorie', array(
      'options' => $categorie,
      'empty' => '(choisissez)'
  ));
echo $this->Form->input('calorie');
?>
<h2> Choix des ingrédients </h2>
<p><div id="trigger_ajout_ingredient"> Ajouter un ingrédient</div></h3></p>
<div id="ajout_ingredient">
	<?php //echo $this->element('add_ingredient', array(), array('cache' => true)); ?>
	<?php echo $this->Html->link('Ajouter un ingredient', '#', array('onclick'=>"var openWin = window.open('".$this->Html->url(array('controller' => 'ingredients', 'action' => 'add_popup'))."', '_blank', 'toolbar=0,scrollbars=1,location=0,status=1,menubar=0,resizable=1,width=500,height=500');  return false;")); ?>
</div>
<?php
foreach($ingredients as $ingre => $key){

  	echo $this->Form->input('IngredientPlat.'.$ingre.'', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>$key["Ingredient"]["nom"], 'value' => $key["Ingredient"]["id"] ));
  	//echo $this->Form->checkbox(array('value' => $key2["id"]));
    //echo $key2["nom"];
}
echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
echo $this->Form->end();
//print_r($plats); ?>
