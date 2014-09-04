<?php
add_action('admin_init', 'stag_styling_options');
function stag_styling_options(){

  $styling_options['description'] = __('Configure the visual appearance of your theme, or insert any custom CSS. You can also edit your site color scheme using <a href="'.admin_url('customize.php').'">WordPress Live Customizer</a>, if applicable.', 'stag');


  $styling_options[] = array(
    'title' => __('Main Layout', 'stag'),
    'desc'  => __('Select main content and sidebar alignment.', 'stag'),
    'type'  => 'radio',
    'id'    => 'style_main_layout',
    'val'   => 'layout-2cr',
    'options' => array(
      'layout-1cf' => __('1 Column (full)', 'stag'),
      'layout-2cr' => __('2 Columns (right)', 'stag'),
      'layout-2cl' => __('2 Columns (left)', 'stag')
    )
  );

  $styling_options[] = array(
    'title' => __('Background Color', 'stag'),
    'desc'  => __('Choose the background color of your site', 'stag'),
    'type'  => 'color',
    'id'    => 'style_background_color',
    'val'   => '#f5f5f5'
  );

  $styling_options[] = array(
    'title' => __('Accent Color', 'stag'),
    'desc'  => __('Choose the accent color of your site', 'stag'),
    'type'  => 'color',
    'id'    => 'style_accent_color',
    'val'   => '#69ae43'
  );

  $styling_options[] = array(
    'title' => __('Body Font', 'stag'),
    'desc'  => __('Quickly add a custom Google Font for body from <a href="http://www.google.com/webfonts/" target="_blank">Google Font Directory.</a><br>
               <code>Example font name: "Source Sans Pro"</code>, for including font weights type <code>Source Sans Pro:400,700,400italic</code>.', 'stag'),
    'type'  => 'text',
    'id'    => 'style_body_font',
    'val'   => 'Open Sans:300,400,700'
  );

  $styling_options[] = array(
    'title' => __('Heading Font', 'stag'),
    'desc'  => __('Quickly add a custom Google Font for Headings from <a href="http://www.google.com/webfonts/" target="_blank">Google Font Directory.</a><br>
               For font type: <code>"Source Sans Pro"</code>, for including specific font weights <code>Source Sans Pro:400,700,400italic</code>.', 'stag'),
    'type'  => 'text',
    'id'    => 'style_heading_font',
    'val'   => ''
  );

  $styling_options[] = array(
    'title' => __('Custom CSS', 'stag'),
    'desc'  => __('Quickly add some CSS to your theme by adding it to this block.', 'stag'),
    'type'  => 'textarea',
    'id'  => 'style_custom_css',
  );

  stag_add_framework_page( 'Styling Options', $styling_options, 10 );
}



/* Output main layout -------------------------------*/
function stag_style_main_layout($classes) {
  $classes[] = stag_get_option('style_main_layout');;
  return $classes;
}
add_filter( 'body_class', 'stag_style_main_layout' );

/* Custom Stylesheet Output -----------------------------------------------*/
function stag_custom_css($content){
  $stag_values = get_option( 'stag_framework_values' );
  if( array_key_exists( 'style_custom_css', $stag_values ) && $stag_values['style_custom_css'] != '' ){
    $content .= '/* Custom CSS */' . "\n";
    $content .= stripslashes($stag_values['style_custom_css']);
    $content .= "\n\n";
  }
  return $content;
}
add_filter( 'stag_custom_styles', 'stag_custom_css' );

function stag_custom_font_output(){
  $fonts = array(stag_get_option('style_body_font'), stag_get_option('style_heading_font'));
  echo '<!-- Google Web Fonts -->'."\n";
  foreach($fonts as $name){
    if($name != ''){
      $name = stag_remove_trailing_char( $name );
      $name = str_replace( ' ', '+', $name );
      echo '  <link href="//fonts.googleapis.com/css?family='.$name.'" rel="stylesheet" type="text/css">'."\n";
    }
  }
  echo "\n";
}
add_action( 'wp_enqueue_scripts', 'stag_custom_font_output' );

if( ! function_exists( 'stag_remove_trailing_char' ) ) {
  function stag_remove_trailing_char( $string, $char = ' ' ) {
    $offset = strlen( $string ) - 1;
    $trailing_char = strpos( $string, $char, $offset );
    if( $trailing_char )
      $string = substr( $string, 0, -1 );
    return $string;
  }
}

if( ! function_exists( 'stag_get_font_face' ) ) {
  function stag_get_font_face( $option ) {
    $stack = null;
    if( $option !=  '') {
      $option = explode( ':', $option );
      // And also check for accidental space at end
      $name = stag_remove_trailing_char( $option[0] );
      // Add the deafult font stack to the end of the
      // google font.
      $stack = $name;
    } else {
      $stack = '';
    }
    return $stack;
  }
}

function stag_user_styles_push($content){
  $bodyfont = stag_get_option('style_body_font');
  $body_font_output = stag_get_font_face($bodyfont);

  $headingfont = stag_get_option('style_heading_font');
  $heading_font_output = stag_get_font_face($headingfont);

  $background_color = stag_get_option('style_background_color');

  $output = "/* Custom Styles Output */\n";

  if($background_color != ''){
    $output .= "body{ background-color: $background_color; }\n";
  }

  if($bodyfont != ''){
    $output .= "body{ font-family: '$body_font_output'; }\n";
  }

  if($headingfont != ''){
    $output .= "\nh1, h2, h3, h4, h5, h6, .heading{";
    $output .= "font-family: '$heading_font_output';";
    $output .= "}\n";
  }

  $accent_color = stag_get_option('style_accent_color');
  $output .= "a, .accent-color, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .footer .twitter-feeds li a { color: {$accent_color}; }";
  $output .= ".accent-background, .more-link, .button, .page-numbers, .nav-links > div, input[type=submit], button, .button { background-color: {$accent_color}; }";


  $content .= $output."\n";
  return $content;
}
add_action( 'stag_custom_styles', 'stag_user_styles_push', 10);
