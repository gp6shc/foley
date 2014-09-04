<?php
/*
Template Name: Home
*/
?>

<!-- Hero Section -->
<div class="page-header home feature push-in">
  <h1 class="title"><span>Welcome to Foley Timber &amp; Land Company</span></h1>
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
</div>

<?php while (have_posts()) : the_post(); ?>

<!-- Featured Section -->
<div class="row">
  <div class="col-md-4 feature">
  	<a href="<?php echo home_url(); ?>/about"><img class="img-thumbnail" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/home_feature1.png" /></a>
  	<h3 class="title"><span>About Us</span></h3>
  	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
  	<a href="<?php echo home_url(); ?>/about"><button class="more" title="Read More">Read More</button></a>
  </div>
  <div class="col-md-4 feature">
  	<a href="<?php echo home_url(); ?>/land"><img class="img-thumbnail" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/home_feature2.png" /></a>
  	<h3 class="title"><span>Our Land</span></h3>
  	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
  	<a href="<?php echo home_url(); ?>/land"><button class="more" title="Read More">Read More</button></a>
  </div>
  <div class="col-md-4 feature">
  	<a href="<?php echo home_url(); ?>/community"><img class="img-thumbnail" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/home_feature3.png" /></a>
  	<h3 class="title"><span>The Community</span></h3>
  	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
  	<a href="<?php echo home_url(); ?>/community"><button class="more" title="Read More">Read More</button></a>
  </div>
</div>

</div></div><!-- close .container to allow .full-width section -->

<!-- About Section -->
<div class="bottom full-width">	
  <div class="about">
    <div class="row">
	  <div class="col-md-12">
	    <h5 class="title"><span>This is a Title</span></h5>
		<h5>Here is a quote about Foley. Something short, simple and to-the-point.</h5>
		<h5>No more than two lines worth of text.</h5>
		<h5><span><a href="#">Link to More.</a></span></h5>
	  </div>
    </div>
  </div>
</div>

<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
