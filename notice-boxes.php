<?php
/**
 * @package Notice-Boxes-Shortcode
 * @version 3.2
 */
/*
Plugin Name: Notice Boxes with Shortcodes
Plugin URI: http://www.techoot.com/notice-boxes
Description: A plugin to show notice boxes on posts and pages via shortcode.
Author: Ayush Agrawal
Version: 3.2
Author URI: http://www.techoot.com/author/ayush
*/
function nbox_admin_actions(){add_options_page("Notice Boxes Settings", "Notice Boxes", 1, "noticeboxes", "nbox_admin");
}add_action('admin_menu', 'nbox_admin_actions');function nbox_admin(){include('nbox_adminpage.php');}
function noticeboxes($atts, $content = null){extract(shortcode_atts(array("type" => 'notice',"align" => 'left',"actualcodetooutput" => '',"close" => 'no'), $atts));$alignstring = 'noticeboxesde';
    if ($align == 'center') {$alignstring = 'noticeboxesc';}if ($type == 'notice') {$type = 'blue';}elseif ($type == 'info') {$type = 'blue';}elseif ($type == 'success') {$type = 'green';}elseif ($type == 'warning') {$type = 'yellow';}elseif ($type == 'error') {$type = 'red';}$actualcodetooutput = '<div class="' . $alignstring . ' ' . $type . '">' . $content . '';
    if ($close == 'yes' or $close == 'true') { $actualcodetooutput .= '<div class="nbox-close">√ó</div></div>';
    } else {$actualcodetooutput .= '</div>';
    }return $actualcodetooutput;
}add_shortcode("noticebox", "noticeboxes");add_shortcode("nbox", "noticeboxes");
function addstyles()
{
    wp_register_style('noticeboxesstyle', plugins_url('/nboxesstyle.css', __FILE__), array(), '20120208', 'all');
    wp_enqueue_style('noticeboxesstyle');
}
add_action('wp_enqueue_scripts', 'addstyles');

function load_js_file()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('the_js', plugins_url('/collapsable.js', __FILE__));
}
add_action('wp_head', 'load_js_file');
?>
