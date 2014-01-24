
<div class="container">
<h1>Ajouter un menu</h1>

<?php
echo $this->Form->create('Menu');
echo $this->Form->input('nom');
echo $this->Form->input('prix');
echo $this->Form->input('description', array('rows' => '3'));

$horaire = array('Midi' => 'Midi', 'Soiree' => 'Soirée');
echo $this->Form->input('horaire', array(
      'options' => $horaire,
      'empty' => '(choisissez)'
  ));
?>
<h2> Choix des plats </h2>
<div id="ajout_ingredient">
	<?php //echo $this->element('add_ingredient', array(), array('cache' => true)); ?>
	<?php echo $this->Html->link('Ajouter un plat', '#', array('onclick'=>"var openWin = window.open('".$this->Html->url(array('controller' => 'plats', 'action' => 'add_popup'))."', '_blank', 'toolbar=0,scrollbars=1,location=0,status=1,menubar=0,resizable=1,width=500,height=500');  return false;")); ?>
</div>
<br>
<br>
<div style="display: flex;">
<?php
	$width = floor(100 / count($categories));
	foreach ($categories as $categorie) {
		echo '<ul style="width: '.$width.'%"><p><b>'.$categorie.'</b></p>';
		foreach($plats as $ingre => $key) {
			if($key['Plat']['categorie'] == $categorie) {
				$tr = false;
				if(in_array($key["Plat"]["id"], $composants))
				  $tr = true;
				echo '<p>'.$this->Form->input('MenuPlat.'.$ingre.'', array('checked'=> $tr, 'type' => 'checkbox', 'hiddenField' => false, 'label' =>$key["Plat"]["nom"], 'value' => $key["Plat"]["id"] )).'</p>';
			}
		}
		echo '</ul>';
	}
	echo "</div>";

	echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
	echo $this->Form->end();
?>