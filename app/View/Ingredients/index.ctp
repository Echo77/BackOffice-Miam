<div class="container">
<h1>Affichage ingrédients</h1>
    <?php echo $this->Html->link(
        'Ajouter un ingredient',
        array('controller' => 'ingredients', 'action' => 'add')
    ); ?>
    <br>
    <br>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>
        <?php 
            if(isset($_GET['order']) && $_GET['order'] == 'DESC')
                echo $this->Html->link('Nom', '/ingredients', array(
                    "controller" => "ingredients",
                    "action" => "index"));
            else 
                echo $this->Html->link('Nom', '/ingredients?order=DESC', array(
                    "controller" => "ingredients",
                    "action" => "index",
                    "?" => array("order" => "DESC")));
        ?>
        </th>
        <th>Pays</th>
        <!--<th>Région</th>-->
        <th>Régime</th>
        <th>Modifier</th>
    </tr>
    
<?php 

    


    foreach($ingredients as $key){
      foreach($key as $key2){
        echo "<tr>";
        echo "<td>".$key2["id"]."</td>";
        echo "<td>".$key2["nom"]."</th>";
        echo "<td>".$key2["pays"]."</td>";
        echo "<td>".$key2["regime"]."</td>";
        //echo "<td>".$key2["regime"]."</td>";
         echo "<td>";
                echo $this->Html->link('Modifier', array('controller' => 'ingredients', 'action' => 'edit', $key2["id"])); 
                echo " / ";
                echo $this->Html->link('Supprimer', array('controller' => 'ingredients', 'action' => 'delete', $key2["id"])); 
                echo "</td></tr>"; 
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

<br>
<br>
<br>	
</div>