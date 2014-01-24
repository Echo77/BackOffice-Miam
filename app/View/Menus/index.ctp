<div class="container">
<h1>Menus Test</h1>
<?php echo $this->Html->link(
    'Ajouter un Menu',
    array('controller' => 'menus', 'action' => 'add')
); ?>   
<br>
<br>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Prix</th>
        <th>
        <?php 
            if((isset($_GET['ordername']) && $_GET['ordername'] == 'DESC') || isset($_GET['orderhor']))
                echo $this->Html->link('Nom', '/menus?ordername=ASC', array(
                    "controller" => "menus",
                    "action" => "index"));
            else 
                echo $this->Html->link('Nom', '/menus?ordername=DESC', array(
                    "controller" => "menus",
                    "action" => "index",
                    "?" => array("order" => "DESC")));
        ?>
        </th>
        <th>Description</th>

        <th>
        <?php 
            echo $this->Html->link('Horaire', '/menus?orderhor=true', array(
                "controller" => "menus",
                "action" => "index"));
        ?>
        </th>

        <th>Plats</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach($menus as $menus_key){
        $good = false;
        $id = 0;
        foreach($menus_key as $key => $menu) {
            if($key == "Menu") {  
                $id = $menu["id"];
                echo "<tr>";
                echo "<td>".$menu["id"]."</td>";
                echo "<td>".$menu["prix"]." €</td>";
                echo "<td>".$menu["nom"]."</td>";
                echo "<td>".$menu["description"]."</td>";
                echo "<td>".$menu['horaire']."</td>";
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
        }
    }
?>
</tbody>
</table>

<?php echo $this->Html->link(
    'Ajouter un Menu',
    array('controller' => 'menus', 'action' => 'add')
); ?>	
<br>
<br>
</div>