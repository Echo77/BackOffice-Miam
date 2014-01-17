<div class="container">
    <h1>Commentaires</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>De</th>
            <th>Message</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($commentaires as $comment){
                $good = false;
                $id = 0;
                foreach($comment as $key => $comm) {
                    $id = $comm["id"];
                    echo "<tr>";
                    echo "<td>".$comm["id"]."</td>";
                    echo "<td>".$comm["date"]."</td>";
                    echo "<td>".$comm["id_Consommateur"]."</td>";
                    echo "<td>".$comm["texte"]."</td>";
                    echo "<td>";
                    echo $this->Html->link('Supprimer', array('controller' => 'commentaires', 'action' => 'delete', $id)); 
                    echo "</td></tr>"; 
                }
            }
        ?>
        </tbody>
    </table>
</div>