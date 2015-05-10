<style type="text/css">
.even-row {
    background: white;
}
.odd-row {
    background: gray;
}
</style>
<table>
<tr><th>Quantity</th><th>Ingredient</th></tr>
<?php
$styles = array('even-row','odd-row');
$db = new PDO('sqlite:altrow.db');
foreach ($db->query('SELECT quantity, ingredient FROM ingredients') as $i => $row) { ?>
<tr class="<?php echo $styles[$i % 2]; ?>">
  <td><?php echo htmlentities($row['quantity']) ?></td>
  <td><?php echo htmlentities($row['ingredient']) ?></td></tr>
<?php } ?>
</table>