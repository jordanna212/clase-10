<?php include('header.php');?>

<div class="col-sm-8">
<section>
<?php
$blog = array_map('str_getcsv', file('data/blog_post.csv'));
array_walk($blog, function(&$a) use ($blog) {$a = array_combine($blog[0], $a);});
array_shift($blog);
$nro = $_GET['url'];
?>
<div class="col-sm-12">
  <article class="row">
    <hr>

<h2><?php echo($blog[$nro]["post_nombre"])?></h2>
<h4><?php echo($blog[$nro]["post_creador"])?></h4>
<img src="<?php echo($blog[$nro]["post_imagen"])?>" width="200">
<p><?php echo($blog[$nro]["post_storyline"])?></p>
<div class="embed-responsive embed-responsive-16by9">
 <?php echo($blog[$nro]["post_video"])?>
</div>
</article>
</section>
</div>
<?php include('footer.php');?>
