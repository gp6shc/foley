<!--<script>
    jQuery(document).ready(function() {
		var nav = jQuery(".navbar-default");
		jQuery(function () {
		   jQuery(window).scroll(function () {
		      if (jQuery(this).scrollTop() > 50) { //when we scroll > x amt px, switch navbar to fixed position
		          nav.css({"position":"fixed", "width":"100%", "background-color":"#222", "top":0, "left":0});
		     }
		      else if (jQuery(this).scrollTop() < 1) { //when we scroll back up > x amt px, go back to original position
		          nav.css({"position":"absolute", "background-color":"transparent", "min-height":"50px", "margin":"0px 0px 20px 0px"});
		     }
		  });
	   });
	});
</script>-->

<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>
<?php if ( is_page('4') ) { // on homepage (id=4), show home-banner slider ?>
<div class="home-banner"></div>
<?php } else { // all other pages, show default ?>
<?php } ?>
