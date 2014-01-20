<div class="container">
<h1>Plats</h1>
	<?php echo $this->Html->link(
	    'Ajouter un Plat',
	    array('controller' => 'plats', 'action' => 'add')
	); ?>
    <br>
    <br>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>
        <?php 
            if(isset($_GET['ordernom']) && $_GET['ordernom'] == 'DESC')
                echo $this->Html->link('Nom', '/plats', array(
                    "controller" => "plats",
                    "action" => "index"));
            else 
                echo $this->Html->link('Nom', '/plats?ordernom=DESC', array(
                    "controller" => "plats",
                    "action" => "index",
                    "?" => array("order" => "DESC")));
        ?>
        </th>
        <th>Image</th>
        <th>Prix</th>
        <th>Régime</th>
        <th>Description</th>
        <th>
        <?php 
            if(isset($_GET['ordercat']) && $_GET['ordercat'] == 'DESC')
                echo $this->Html->link('Catégorie', '/plats', array(
                    "controller" => "plats",
                    "action" => "index"));
            else 
                echo $this->Html->link('Catégorie', '/plats?ordercat=DESC', array(
                    "controller" => "plats",
                    "action" => "index",
                    "?" => array("order" => "DESC")));
        ?>
        </th>
        <th>Horaire</th>
        <th>Saison</th>
        <th>Ingredient</th>
        <th>Modifier</th>
    </tr>

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
			    echo "<td>".$plat["nom"]."</td>";
			    echo '<td>'.$this->Html->image($plat["photo"], array('alt' => 'CakePHP', 'width'=>'150px'))."</td>";
			    echo "<td>".$plat["prix"]." €</td>";
			    echo "<td>".$plat["regime"]."</td>";
			    echo "<td>".$plat["description"]."</td>";
			    echo "<td>".$plat["categorie"]."</td>";
			    echo "<td>".$plat["horaire"]."</td>";
			    echo "<td>".$plat["saison"]."</td>";
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
			    echo "<td>";
				echo $this->Html->link('Modifier', array('controller' => 'plats', 'action' => 'edit', $id)); 
				echo " / ";
				echo $this->Html->link('Supprimer', array('controller' => 'plats', 'action' => 'delete', $id)); 
				echo "</td></tr>"; 
				$good = false;
			}
			//echo $this->$Html->link('Supprimer', "/plats/delete/{$plat["id"]}", null, 'Etes-vous sûr ?' );	
		}
	}
?>
</tbody>
</table>

    <!-- Here is where we loop through our $posts array, printing out post info -->
<?php //print_r($plats) ?>
<?php //print_r($ingredients) ?>



<?php echo $this->Html->link(
    'Ajouter un Plat',
    array('controller' => 'plats', 'action' => 'add')
); ?>	
<br>
<br>
<br>
</div>