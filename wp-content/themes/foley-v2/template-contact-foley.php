<?php
/*
Template Name: Contact Foley
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
    <div class="push-in">
        <h1 class="entry-title"><span><?php the_title(); ?></span></h1>
    </div>
    
    <!-- BEGIN .entry-content -->
    <div class="entry-content">
        <?php
            the_content( __('Continue Reading', 'stag') );
            wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'stag').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            
            <div class="grid_12 omega center">
		   	  <h3 class="name"><span>Foley Timber and Land Company, Limited Partnership,<br> A Delaware Limited Partnership</span></h3>
		  	    <p>1700 Foley Lane</p>
		  	    <p>Perry, FL 32348</p>
		  	    <p><span class="icon">phone:</span> 850.838.2224</p>
		  	    <p><span class="icon">email:</span> ftlc@fairpoint.net</p>
		  	    <a href="mailto:ftlc@fairpoint.net"><button class="more" title="">Email us</button></a>
		    </div>
		    
		    <div class="clearfix"></div>
            
            <div class="grid_12 omega">
		  	  <h3 class="name"><span>Our Location</span></h3>
		  	  
		  	  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
		  	  <script type="text/javascript">
            //custom google map for branding
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                var mapOptions = {
                    zoom: 12,
                    // latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(30.0685119, -83.55867330000001), // Foley
                    //styles
                     styles: [{"featureType":"water"[{"color":"#6ebeab"}]},{"featureType":"road"[{"color":"#866533"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f9f9f9"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#000"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#000"}]},{"featureType":"landscape.natural.terrain","stylers":[{"color":"#000"}]},{}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');
                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
            }
        </script>
        <style type="text/css">#map {width: 100%;height: 475px;margin-bottom: 30px;}</style>
       	  <div id="map"></div>
		    </div>
            
       <!-- <div class="grids">
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
	  </div> -->   
	  
	  
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