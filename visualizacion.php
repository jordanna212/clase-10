<?php include('header.php');?>
<section>
<h2>Visualización</h2>
<?php
$viz = array_map('str_getcsv', file('data/blog.csv'));
array_walk($viz, function(&$a) use ($viz) {$a = array_combine($viz[0], $a);});
array_shift($viz);
$all = count($viz);
?>
<table class="table table-hover">
<tr>
  <th>Ranking</th>
  <th>Serie</th>
  <th>Creador</th>
  <th>Temporadas y episodios</th>
</tr>

<?php for($n=0; $n < $all; $n++){?>
  <tr>
    <td><?php echo($viz[$n]["Id"]);?></td>
    <td><?php echo($viz[$n]["Nombre"]);?></td>
    <td><?php echo($viz[$n]["Creador"]);?></td>
    <td><?php echo($viz[$n]["Temporadas"]);?></td>
  </tr>
<?php };?>

</table>

</section>
<?php include('footer.php');?>
