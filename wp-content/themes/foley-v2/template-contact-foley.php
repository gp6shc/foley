<?php
/*
Template Name: Contact Foley
*/
?>

<?php get_header(); ?>

<!-- Contact pg style overrides -->
<style>
body{background:url('http://192.155.94.156/foley/wp-content/uploads/2014/02/wood.png') 0px 0px no-repeat;background-position:center center;background-size:cover;}
.container{margin-bottom:200px;position:relative;max-width:85%;background:#38353C;}
.custom-background.universal{background-color:transparent!important;}
.entry-title span, .title span{background: #38353C;}
h3.title.no{margin-bottom:-15px;}
p{color:#f9f9f9;}
span.icon{color:#6D5127;}
.entry-content p{margin: 0 0 1px 0;}
h3.name{color:#f9f9f9;text-transform: uppercase;font-size:inherit;font-weight:700;}
button{margin-top:15px;}
</style>

<!--BEGIN #primary .hfeed-->
<div id="primary" class="hfeed" role="main">

    <?php stag_page_before(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

    <?php stag_page_before(); ?>
    <!--BEGIN .hentry-->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php stag_page_start(); ?>
    <div class="push-in">
        <h1 class="entry-title"><span><?php the_title(); ?></span></h1>
    </div>
    
    <!-- BEGIN .entry-content -->
    <div class="entry-content center">
        <?php
            the_content( __('Continue Reading', 'stag') );
            wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'stag').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            
            
        <div class="grids">
		  <div class="grid-4 center">
		  	<h3 class="title no"><span>Contact</span></h3>
		  	<h3 class="name">Dennis L. Carey</h3>
		  	  <p>Senior Vice President</p>
		  	  <p>1700 Foley Lane | Perry, FL 32348</p>
		  	  <p><span class="icon">o.</span> 850.838.2224 &nbsp; <span class="icon">f.</span> 850.838.2224</p>
		  	  <p><span class="icon">c.</span> 850.838.2224</p>
		  	  <a href="#"><button class="more" title="Read More">Email</button></a>
		  </div>
		  <div class="grid-4 center">
		  	<h3 class="title no"><span>Contact</span></h3>
		  	<h3 class="name">Travis McCoy</h3>
		  	  <p>Senior VP, Woodlands Manager</p>
		  	  <p>1700 Foley Lane | Perry, FL 32348</p>
		  	  <p><span class="icon">o.</span> 850.838.2224 &nbsp; <span class="icon">f.</span> 850.838.2224</p>
		  	  <p><span class="icon">c.</span> 850.838.2224</p>
		  	  <a href="#"><button class="more" title="Read More">Email</button></a>
		  </div>
		  <div class="grid-4 center">
		  	<h3 class="title no"><span>Contact</span></h3>
		  	<h3 class="name">Angus B. Taff, III</h3>
		  	  <p>Senior Vice President, Planning</p>
		  	  <p>1700 Foley Lane | Perry, FL 32348</p>
		  	  <p><span class="icon">o.</span> 850.838.2224 &nbsp; <span class="icon">f.</span> 850.838.2224</p>
		  	  <p><span class="icon">c.</span> 850.838.2224</p>
		  	  <a href="#"><button class="more" title="Read More">Email</button></a>
		  </div>
	  </div><!-- /.grids -->   
	  
	  
    <!-- END .entry-content -->
    </div>

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