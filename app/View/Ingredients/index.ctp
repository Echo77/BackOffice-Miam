<div class="container">
<h1>Affichage ingrédients</h1>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Pays</th>
        <th>Région</th>
        <th>Description</th>
        <th>Régime</th>
    </tr>
    

    <!-- Here is where we loop through our $posts array, printing out post info -->
<?php 
    foreach($ingredients as $key){
      foreach($key as $key2){
        echo "<tr>";
        echo "<td>".$key2["id"]."</td>";
        echo "<td>".$key2["nom"]."</th>";
        echo "<td>".$key2["pays"]."</td>";
        echo "<td>".$key2["region"]."</td>";
        echo "<td>".$key2["description"]."</td>";
        echo "<td>".$key2["regime"]."</td>";
        echo "</tr>";
      }
    } 
?>
</table>
<hr>
    <?php echo $this->Html->link(
        'Ajouter un ingredient',
        array('controller' => 'ingredients', 'action' => 'add')
    ); ?>	
</div>