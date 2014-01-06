<div class="container">
<h1>Menus Test</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Prix</th>
        <th>Nom</th>
        <th>Description</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php print_r($plats); ?>
</table>

<?php echo $this->Html->link(
    'Ajouter un Menu',
    array('controller' => 'menus', 'action' => 'add')
); ?>	
</div>