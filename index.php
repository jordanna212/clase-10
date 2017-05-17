<?php include('header.php');?>
<section>
<h2>¡No te desesperes! Aquí va la mejor lista de CN</h2>
<?php
$blog = array_map('str_getcsv', file('url'));
array_walk($blog, function(&$a) use ($blog) {$a = array_combine($blog[0], $a);});
array_shift($blog);
?>
<div class="col-sm-12 col-lg-10 col-lg-offset-1">
  <?php
  // basta con la línea de PHP para llamar al imdb-movies.csv y asignarlo a la variable $csv
  $csv = array_map('str_getcsv', file('data/blog.csv'));
  // pero debo hacer un pequeño ajuste, para eliminar del arreglo el encabezado del imdb-movies.csv
  array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
  array_shift($csv);
  // ahora puedo crear un bucle "for(){}" que examine lo asignado como contenido a la variable $csv
  // lo que esté contenido en la variable se repetirá tantas veces como arreglos tenga la variable $csv
  for($a = 0; $a < $total = count($csv); $a++){?>
    <article class="row">
      <hr>
      <div class="col-xs-5 col-sm-3 col-md-2"><img src="<?php echo $csv[$a]['Imagen'];?>" class="img-responsive"></div>
      <div class="col-xs-7 col-sm-9 col-md-10">
        <h3><?php echo($a+1);?>. <?php echo $csv[$a]['Nombre'];?></h3>
        <h5>Creada por <?php echo $csv[$a]['Creador'];?> </h5>
        <h6><?php echo $csv[$a]['Temporadas'];?></h6>
        <p><?php echo $csv[$a]['Storyline'];?></p>
        <p><a href="post.php?url=<?php print $a;?>">ver más...</a></p>
      </div>
    </article>
  <?php };?>
</section>
</div>
<?php include('footer.php');?>
