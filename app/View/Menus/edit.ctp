
<div class="container">
<h1>Ajouter un menu</h1>

<?php
echo $this->Form->create('Menu');
echo $this->Form->input('nom');
echo $this->Form->input('prix');
echo $this->Form->input('description', array('rows' => '3'));
?>
<h2> Choix des plats </h2>
<div id="ajout_ingredient">
	<?php //echo $this->element('add_ingredient', array(), array('cache' => true)); ?>
	<?php echo $this->Html->link('Ajouter un plat', '#', array('onclick'=>"var openWin = window.open('".$this->Html->url(array('controller' => 'plats', 'action' => 'add_popup'))."', '_blank', 'toolbar=0,scrollbars=1,location=0,status=1,menubar=0,resizable=1,width=500,height=500');  return false;")); ?>
</div>
<?php
foreach($plats as $ingre => $key){
	//print_r($ingre);
  	//print_r($key);
  	echo $this->Form->input('MenuPlat.'.$ingre.'', array('type' => 'checkbox', 'hiddenField' => false, 'label' =>$key["Plat"]["nom"], 'value' => $key["Plat"]["id"] ));
  	//echo $this->Form->checkbox(array('value' => $key2["id"]));
    //echo $key2["nom"];
}

echo $this->Form->button('Sauvegarder', array('type' => 'submit', 'class' =>'btn btn-default'));
echo $this->Form->end();
//print_r($plats); ?>

