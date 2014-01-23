<div class="container">
<h1>Menus Test</h1>
<?php echo $this->Html->link(
    'Ajouter un Menu',
    array('controller' => 'menus', 'action' => 'add')
); ?>   
<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Prix</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Plats</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //print_r($plats);
    foreach($menus as $menus_key){
        $good = false;
        $id = 0;
        foreach($menus_key as $key => $menu){
            
        //print_r($key);
    
            if($key == "Menu") {  
                $id = $menu["id"];
                echo "<tr>";
                echo "<td>".$menu["id"]."</td>";
                echo "<td>".$menu["prix"]." €</td>";
                echo "<td>".$menu["nom"]."</td>";
                echo "<td>".$menu["description"]."</td>";
            }
            
            if($key == "Plat") {
                echo "<td>";
                foreach($menu as $plat){
                    echo $plat["nom"]."<br>"; 
                }
                $good = true;
            }
            if($good) {  
                echo "</td>";
                echo "<td>";
                echo $this->Html->link('Modifier', array('controller' => 'menus', 'action' => 'edit', $id)); 
                echo " / ";
                echo $this->Html->link('Supprimer', array('controller' => 'menus', 'action' => 'delete', $id)); 
                echo "</td></tr>"; 
            }
            //echo $this->$Html->link('Supprimer', "/plats/delete/{$plat["id"]}", null, 'Etes-vous sûr ?' );
   
}}?>
</tbody>
</table>

<?php echo $this->Html->link(
    'Ajouter un Menu',
    array('controller' => 'menus', 'action' => 'add')
); ?>	
</div>