<?php
/**
 * Plugin Name: Stacked Pictures
 * Description: A simple lightweight stacked pictures plugin
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: Nyffels IT
 * Author URI: https://nyffels-it.be
 * License: MIT
 **/

add_shortcode("stacked-pictures", "stackedPicturesFuction");

function stackedPicturesFuction($atts)
{
  $default = array(
    'top' => "",
    'top-alt' => "",
    'bottom' => "",
    'bottom-alt' => "",
    'padding-top' => "20%"
  );

  $a = array_replace_recursive($default, $atts);

  ob_start();
  ?>
  <style>
    .picture-stack {
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      position: relative;
    }

    .picture-stack-top {
      grid-column: 1 / span 8;
      grid-row: 1;
      padding-top: <?php echo $a['padding-top'] ?>;
      z-index: 1;
    }

    .picture-stack-bottom {
      grid-column: 4 / -1;
      grid-row: 1;
    }
  </style>

  <div class="picture-stack">
    <div class="picture-stack-top"><img src="<?php echo $a['top']; ?>"
        alt="<?php echo $a['top-alt'] ?>" /></div>
    <div class="picture-stack-bottom"><img src="<?php echo $a['bottom']; ?>"
        alt="<?php echo $a['bottom-alt'] ?>" /></div>
    </dvi>
    <?php
    return ob_get_clean();
}