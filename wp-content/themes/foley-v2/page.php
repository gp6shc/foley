<?php get_header(); ?>
<style>
.hfeed .hentry{margin-bottom:0;}
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
        <h1 class="entry-title "><span><?php the_title(); ?></span></h1>
    </div>
    <!-- BEGIN .entry-content -->
    <div class="entry-content">
        <?php
            the_content( __('Continue Reading', 'stag') );
            wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'stag').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
        ?>
    <!-- END .entry-content -->
    </div>

    <?php stag_page_end(); ?>
    <!--END .hentry-->
    </article>
    <?php stag_page_after(); ?>

    <?php endwhile; ?>
    <?php stag_page_after(); ?>
    
    <?php get_template_part('/includes/sections/section-wood_top'); ?>

<!--END #primary .hfeed-->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>