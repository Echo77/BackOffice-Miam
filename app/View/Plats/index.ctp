<div class="container">
<h1>Plat Test</h1>
<table class="table table-striped">
	<thead>
    <tr>
        <th>Id</th>
        <th>Prix</th>
        <th>Nom</th>
        <th>Calories</th>
        <th>Description</th>
        <th>Categories</th>
        <th>Ingredient</th>
        <th>Image</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach($plats as $plats_key){
    	$good = false;
    	$id = 0;
    	foreach($plats_key as $key => $plat){
    		
    
		  	if($key == "Plat") {  
		  		$id = $plat["id"];
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
				$good = true;
			}
		  	if($good) {  
			  	echo "</td>";

			  	echo "<td>".$this->Html->image($picture, array('max-height'=>'80%'))."</td>";
			    
			    echo "<td>";
				echo $this->Html->link('Modifier', array('controller' => 'plats', 'action' => 'edit', $id)); 
				echo " / ";
				echo $this->Html->link('Supprimer', array('controller' => 'plats', 'action' => 'delete', $id)); 
				echo "</td></tr>"; 
			}
			//echo $this->$Html->link('Supprimer', "/plats/delete/{$plat["id"]}", null, 'Etes-vous sûr ?' );

	
	
	
	
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