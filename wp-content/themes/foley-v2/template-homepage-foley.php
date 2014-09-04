<?php
/*
* Template Name: Homepage, Foley
*/
?>

<?php get_header(); ?>

<!--BEGIN #primary .hfeed-->
<div id="primary" class="hfeed" role="main">

    <?php stag_page_before(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

    <?php stag_page_before(); ?>
    <!--BEGIN .hentry-->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php stag_page_start(); ?>

    <!-- BEGIN Homepage Featured Section -->
    <div class="page-header home center push-in">
	  <h1 class="title"><span>Welcome to Foley Timber &amp; Land Company</span></h1>
	  <p class="italic">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
	</div>
	
	<div class="grids">
	  <div class="grid-4 center">
	  	<a href="<?php echo home_url(); ?>/about-foley"><img class="thumb" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/home_feature1.png" /></a>
	  	<h3 class="title"><span>About Us</span></h3>
	  	<p class="home">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
	  	<a href="<?php echo home_url(); ?>/about-foley"><button class="more" title="Read More">Read More</button></a>
	  </div>
	  <div class="grid-4 center">
	  	<a href="<?php echo home_url(); ?>/our-land"><img class="thumb" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/home_feature2.png" /></a>
	  	<h3 class="title"><span>Our Land</span></h3>
	  	<p class="home">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
	  	<a href="<?php echo home_url(); ?>/our-land"><button class="more" title="Read More">Read More</button></a>
	  </div>
	  <div class="grid-4 center">
	  	<a href="<?php echo home_url(); ?>/the-community"><img class="thumb" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/home_feature3.png" /></a>
	  	<h3 class="title"><span>The Community</span></h3>
	  	<p class="home">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
	  	<a href="<?php echo home_url(); ?>/the-community"><button class="more" title="Read More">Read More</button></a>
	  </div>
	</div><!-- /.grids -->
	<!-- END Homepage Featured Section -->
	
	<?php get_template_part('/includes/sections/section-wood_top'); ?>

    <?php stag_page_end(); ?>
    <!--END .hentry-->
    </article>
    <?php stag_page_after(); ?>

    <?php endwhile; ?>
    <?php stag_page_after(); ?>

<!--END #primary .hfeed-->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>