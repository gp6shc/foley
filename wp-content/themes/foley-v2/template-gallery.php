<?php
/*
 * Template Name: Media Gallery
 *
 */

get_header(); ?>
<!-- quick overrides -->
<style>
.container, .title span{background: #38353C;}
p{color:#f9f9f9;}
.about{background: #f9f9f9;}
h3.about{color: #38353C;}
.italic{color: #38353C;}
</style>

<!--BEGIN #primary .hfeed-->
<div id="primary" class="full" role="main">

    <div class="page-header home center push-in">
	  <h1 class="title"><span>Opportunity Awaits</span></h1>
	  <p>Explore photos and videos of Foley Timber &amp; Land Company here.</p>
	</div>

<?php while(have_posts()): the_post(); ?>

<?php if(stag_get_option('portfolio_style') == 'filterable'): ?>
    <ul id="portfolio-filter" class="portfolio-filter">
        <li><a href="#" data-filter="*" class="current">Show All</a></li>
        <?php

        $terms = get_terms('skill');
        $count = count($terms);
        $i = 0;

        if($count > 0){
            foreach($terms as $term){
                echo '<span class="divider">/</span><li><a href="#" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>';
            }
        }

        ?>
    </ul>
<?php endif; ?>
<?php endwhile; ?>

<div class="portfolio-items">
    <div id="filterable-portfolio" class="grids portfolios" data-filter-type="<?php echo stag_get_option('portfolio_style'); ?>">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query = new WP_Query();
        $query->query(
          array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
            'paged' => $paged
            )
          );

        while ($query->have_posts()) : $query->the_post();

        if( !has_post_thumbnail() ) continue;

        $skills = get_the_terms(get_the_ID(), 'skill');

        $class = 'grid-3';

        if(is_array($skills)){
            foreach($skills as $skill){
                $class .= ' '.$skill->slug;
            }
        }

        ?>

        <div <?php post_class($class); ?>>
            <div class="overlay">
              <h3 class="gallery-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'stag'), get_the_title()); ?>"> <?php the_title(); ?></a></h3>
              <div class="portfolio-navigation">
                <a href="<?php the_permalink(); ?>" class="accent-background portfolio-trigger" data-id="<?php the_ID(); ?>"><i class="icon-eye"></i></a>
                <!--<a href="<?php the_permalink(); ?>" class="accent-background" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'stag'), get_the_title()); ?>"><i class="icon-post-link"></i></a>-->
              </div>
            </div>
            <?php the_post_thumbnail('full'); ?>
        </div>


        <?php
        endwhile;
        wp_reset_query();
        ?>
    </div>
    <?php
    if($query->max_num_pages > 1): ?>
    <a href="#" class="button" id="load-more">Load More</a>
    <?php endif; ?>

</div>

<?php get_template_part('/includes/sections/section-wood_top'); ?>


<!--END #primary .hfeed-->
</div>



<?php get_footer(); ?>
