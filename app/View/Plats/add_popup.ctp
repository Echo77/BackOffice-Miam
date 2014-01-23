
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

$saison = array('Ete' => 'Été', 'Automne' => 'Automne', 'Hivers' => 'Hivers', 'Printemps' => 'Printemps');

$horaire = array('Midi' => 'Midi', 'Soirée' => 'Soirée');

echo $this->Form->input('categorie', array(
      'options' => $categorie,
      'empty' => '(choisissez)'
  ));

//echo $this->Form->input('calorie');
$regime = array('Leger' => 'Léger', 'Moyen' => 'Moyen', 'Gourmand' => 'Gourmand');
echo $this->Form->input('regime', array(
      'options' => $regime,
      'empty' => '(choisissez)'
));

echo $this->Form->input('saison', array(
      'options' => $saison,
      'empty' => '(choisissez)'
  ));
echo $this->Form->input('horaire', array(
      'options' => $horaire,
      'empty' => '(choisissez)'
  ));
?>
<h2> Choix des ingrédients </h2>
<div id="ajout_ingredient">
  <?php //echo $this->element('add_ingredient', array(), array('cache' => true)); ?>
  <?php echo $this->Html->link('Ajouter un ingredient', '#', array('onclick'=>"var openWin = window.open('".$this->Html->url(array('controller' => 'ingredients', 'action' => 'add_popup'))."', '_blank', 'toolbar=0,scrollbars=1,location=0,status=1,menubar=0,resizable=1,width=500,height=500');  return false;")); ?>
</div>
<div style="display: flex">
<?php
    $width = floor(100 / (count($ingredients) / 5));
    echo '<ul style="width: '.$width.'%;">';
    $count = 0;
    foreach($ingredients as $ingre => $key){
      if($count++ == 5) {
        $count = 1;
        echo '</ul><ul style="width: '.$width.'%">';
      }
      echo '<p>'.$this->Form->input('IngredientPlat.'.$ingre.'', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>$key["Ingredient"]["nom"], 'value' => $key["Ingredient"]["id"] )).'</p>';
    }
    echo "</ul></div>";
?>
<div id="close_popup">
<?php
echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
echo $this->Form->end();
//print_r($plats); ?>
</div>
