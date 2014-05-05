<?php ob_start();
/*
Plugin Name: WP Content Copy Protection
Plugin URI: http://www.wp-buy.com/
Description: This wp plugin protect the posts content from being copied by any other web site author , you dont want your content to spread without your permission!!
Version: 1.3
Author: wp-buy.com
Author URI: http://www.wp-buy.com/
*/
?>
<?php
//define all variables the needed alot
include 'the_globals.php';
$wccp_settings = wccp_read_options();
//------------------------------------------------------------------------
function wccp_header()
{
	global  $wccp_settings;
	if ($wccp_settings['css_protection'] == 'Enabled') {
	?>
	<style>
	.unselectable 
		{
	    -moz-user-select:none;
	    -webkit-user-select:none;
		}
		</style>
		<script type="text/javascript">
		var e = document.getElementsByTagName('body')[0];
		e.setAttribute('unselectable',on);
		</script>
	<?php } 
	if ( (is_home() && $wccp_settings['home_page_protection'] == 'Enabled') || (is_single() && $wccp_settings['single_posts_protection'] == 'Enabled') )
	{
	?>
	<script type="text/javascript">
	function disable_copy(hotkey)
	{
	if(!hotkey) var hotkey = document.body;
	if (typeof hotkey.onselectstart!="undefined") //For IE 
		hotkey.onselectstart=function(){return false}
	else if (typeof hotkey.style.MozUserSelect!="undefined") //For Firefox
		hotkey.style.MozUserSelect="none"
	else //Opera
		hotkey.onmousedown=function(){return false}
	hotkey.style.cursor = "default"
	}
	
	function disableEnterKey(e)
	{
		if (!e) var e = window.event;
		if (e.ctrlKey){
		alert('content is protected!');
	     var key;
	     if(window.event)
	          key = window.event.keyCode;     //IE
	     else
	          key = e.which;     //firefox (97)
	     if (key == 97 || key == 65 || key == 67 || key == 88 || key == 43 || key == 26 || key == 5)
	          return false;
	     else
	     	return true;
	          }

	}
	</script>
	<?php
	}
}
//----------------------------------------------------------------
function wccp_footer()
{
	global  $wccp_settings;
	if ( $wccp_settings['right_click_by_mouse_protection'] == 'Enabled')
	  {
	?>
		<script type="text/javascript">
		//disable right click
		function md(e) 
		{ 
		  try { if (event.button==2||event.button==3) return false; }  
		  catch (e) { if (e.which == 3) return false; } 
		}
		document.oncontextmenu = function() { return false; }
		document.ondragstart   = function() { return false; }
		document.onmousedown   = md;
		</script>
	  <?php } ?>
	<script type="text/javascript">
	disable_copy(document.body);
	document.body.onkeypress = disableEnterKey; //this disable Ctrl+A select action for firefox specially
	//chrome + mac
	$(document).keydown(function(event) {
	if(event.which == 17) return false; //chrome ctrl key
	if(event.which == 157) return false; //mac command key
	if(event.ctrlKey) return false; //random
	//event.preventDefault();
	//return false;
	});
	
	</script>
	<?php
}
//------------------------------------------------------------------------
// Add specific CSS class by filter
function wccp_class_names($classes) {
	if ( (is_home() && $wccp_settings['home_page_protection'] == 'Enabled' && $wccp_settings['css_protection'] == 'Enabled') || (is_single() && $wccp_settings['single_posts_protection'] == 'Enabled') && $wccp_settings['css_protection'] == 'Enabled' )
	{
		$classes[] = 'unselectable';
		return $classes;
	}
	else{
	$classes[] = 'none';
	return $classes;
	}//problem fixed here
}
//------------------------------------------------------------------------
function set_wccp_div_and_code($content)
{
global  $wccp_settings;
if (is_single() && $wccp_settings['css_protection'] == 'Enabled') {
	return '<div id="wccp" name="wccp" class="unselectable" unselectable="on">'.$content.'</div>';
}else {
        return $content;
    }
}
//------------------------------------------------------------------------
add_action('wp_head','wccp_header');
add_action('wp_footer','wccp_footer');
add_filter('body_class','wccp_class_names');
add_filter('the_content','set_wccp_div_and_code');
//-------------------------------------------------------Function to read options from the database
function wccp_read_options()
{
	if (get_option('wccp_settings'))
		$wccp_settings = get_option('wccp_settings');
	else
		$wccp_settings = wccp_default_options();

	return $wccp_settings;
}
//-------------------------------------------------------Set default values to the array
function wccp_default_options(){
	$pluginsurl = plugins_url( '', __FILE__ );
	$wccp_settings =
	Array (
			'single_posts_protection' => 'Enabled', // prevent content copy, take 3 parameters, 1.content: to prevent content copy only	2.all	3.none
			'right_click_by_mouse_protection' => 'Enabled', // prevent right click by mouse
			'css_protection' => 'Enabled', // idle
			'home_page_protection' => 'Enabled', // idle
			'show_protection_info' => 'yes' // about the plugin
		);
	return $wccp_settings;
}
//------------------------------------------------------------------------
//First use the add_action to add onto the WordPress menu.
add_action('admin_menu', 'wccp_add_options');
//Make our function to call the WordPress function to add to the correct menu.
function wccp_add_options() {
	add_options_page('WP Content Copy Protection', 'WP Content Copy Protection', 8, 'wccpoptions', 'wccp_options_page');
}
//------------------------------------------------------------------------
function wccp_options_page() {
     include 'admin-core.php';
}
?>