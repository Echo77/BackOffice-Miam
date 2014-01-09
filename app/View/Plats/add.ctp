
<div class="container">
<h1>Ajouter un plat</h1>

<?php
echo $this->Form->create('Plat');
echo $this->Form->input('Plat.nom');
echo $this->Form->input('Plat.prix');
echo $this->Form->input('Plat.description', array('rows' => '3'));


$categorie = array('Salade' => 'Salade', 'Entrees froides' => 'Entrées froides', 'Entrees chaude' => 'Entrées Chaudes', 'Beignets' => 'Beignets', 'Assiette' => 'Assiette', 'Boisson');

echo $this->Form->input('categorie', array(
      'options' => $categorie,
      'empty' => '(choisissez)'
  ));
echo $this->Form->input('calorie');
?>
<h2> Choix des ingrédients </h2>

<?php
foreach($ingredients as $ingre => $key){
	//print_r($ingre);
  	//print_r($key);
  	echo $this->Form->input('IngredientPlat.'.$ingre.'', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>$key["Ingredient"]["nom"], 'value' => $key["Ingredient"]["id"] ));
  	//echo $this->Form->checkbox(array('value' => $key2["id"]));
    //echo $key2["nom"];
  
  
}
echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
echo $this->Form->end();
//print_r($plats); ?>
