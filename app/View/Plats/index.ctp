<div class="container">
<h1>Plat Test</h1>
<table class="table table-striped">
	<thead>
    <tr>
        <th>Id</th>
        <th>Prix</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Calories</th>
        <th>Categories</th>
        <th>Ingredient</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //print_r($plats);
    foreach($plats as $plats_key){
    	foreach($plats_key as $key => $plat){
    	//print_r($key);
    
  	if($key == "Plat") {  
  	echo "<tr>";
    echo "<td>".$plat["id"]."</td>";
    echo "<td>".$plat["prix"]." €</td>";
    echo "<td>".$plat["nom"]."</td>";
    echo "<td>".$plat["calorie"]."</td>";
    echo "<td>".$plat["description"]."</td>";
    echo "<td>".$plat["categorie"]."</td>";
	}
    
	if($key == "Ingredient") {
	echo "<td>";
		foreach($plat as $ingredient){
			echo $ingredient["nom"]."<br>"; 
		}
    echo "</td>";
    echo "<td>";
	echo $this->Html->link('Modifier', array('controller' => 'plats', 'action' => 'edit'));
	echo "</td></tr>"; 
	}	
	
	
}}?>
</tbody>
</table>

    <!-- Here is where we loop through our $posts array, printing out post info -->
<?php //print_r($plats) ?>
<?php //print_r($ingredients) ?>



<?php echo $this->Html->link(
    'Ajouter un Plat',
    array('controller' => 'plats', 'action' => 'add')
); ?>	
</div>