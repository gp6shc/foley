<?php
add_action('widgets_init', create_function('', 'return register_widget("stag_featured_portfolio");'));

class stag_featured_portfolio extends WP_Widget{
  function stag_featured_portfolio(){
    $widget_ops = array(
      'classname' => 'featured-portfolio',
      'description' => __('Display a featured portfolio', 'stag')
    );
    $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'stag_featured_portfolio');
    $this->WP_Widget('stag_featured_portfolio', __('Featured Portfolio', 'stag'), $widget_ops, $control_ops);
  }

  function widget($args, $instance){
    extract($args);

    // VARS FROM WIDGET SETTINGS
    $title = apply_filters('widget_title', $instance['title'] );
    $postid = $instance['postid'];

    echo $before_widget;

    if ( $title ) { echo $before_title . $title . $after_title; }
    
    // Widget contents starts here

    if($postid != ''){
      query_posts(array(
        'p' => $postid,
        'post_type' => 'portfolio'
        ));

      while(have_posts()): the_post();

      $projectImages = explode(',', get_post_meta(get_the_ID(), '_stag_portfolio_images', true));

      echo '<div id="featured-portfolio-slider-'.get_the_ID().'" class="flexslider"><ul class="slides">';
      foreach($projectImages as $img){
          echo '<li><a href="'.get_permalink().'"><img src="'.$img.'" alt="'.get_the_title().'"></a></li>';
      }
      echo '</ul></div>';

      endwhile;
      wp_reset_query();
    }

    echo $after_widget;
  }

  function update($new_instance, $old_instance){
    $instance = $old_instance;

    // STRIP TAGS TO REMOVE HTML
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['postid'] = strip_tags($new_instance['postid']);

    return $instance;
  }

  function form($instance){
    $defaults = array(
      'title' => 'Featured Portfolio',
      'postid' => ''
      );

    $instance = wp_parse_args((array) $instance, $defaults);

    /* HERE GOES THE FORM */
    ?>

    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'stag'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('postid'); ?>"><?php _e('Post ID:', 'stag'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postid' ); ?>" name="<?php echo $this->get_field_name( 'postid' ); ?>" value="<?php echo $instance['postid']; ?>" />
      <span class="description"><?php _e('Enter the Portfolio post ID', 'stag'); ?></span>
    </p>

    <?php
  }
}

?>
