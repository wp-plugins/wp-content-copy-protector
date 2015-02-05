<?php ob_start();
/*
Plugin Name: WP Content Copy Protection & No Right Click
Plugin URI: http://wordpress.org/plugins/wp-content-copy-protector/
Description: This wp plugin protect the posts content from being copied by any other web site author , you dont want your content to spread without your permission!!
Version: 1.5.0.1
Author: wp-buy
Author URI: http://www.wp-buy.com/
*/
?>
<?php
//delete_option('wccp_settings');
//define all variables the needed alot
include 'the_globals.php';
$wccp_settings = wccp_read_options();
//---------------------------------------------------------<!-- SimpleTabs -->
function wccp_enqueue_scripts() {
	global $pluginsurl;
	$admincore = '';
	if (isset($_GET['page'])) $admincore = $_GET['page'];
	if( is_admin() && $admincore == 'wccpoptionspro') {
	wp_enqueue_script('jquery');
	wp_register_script('simpletabsjs', $pluginsurl.'/js/simpletabs_1.3.js');
	wp_enqueue_script('simpletabsjs');
	
	wp_register_style('simpletabscss', $pluginsurl.'/css/simpletabs.css');
	wp_enqueue_style('simpletabscss');
	
	wp_register_style('bootstrapcss', $pluginsurl.'/flat-ui/css/bootstrap.css');
	wp_enqueue_style('bootstrapcss');
	
	wp_register_style('flat-ui-css', $pluginsurl.'/flat-ui/css/flat-ui.css');
	wp_enqueue_style('flat-ui-css');
	
	wp_register_script('jquery-1.8.3.min.js', $pluginsurl.'/flat-ui/js/jquery-1.8.3.min.js');
	wp_enqueue_script('jquery-1.8.3.min.js');
	
	wp_register_script('jquery-ui-1.10.3.custom.min.js', $pluginsurl.'/flat-ui/js/jquery-ui-1.10.3.custom.min.js');
	wp_enqueue_script('jquery-ui-1.10.3.custom.min.js');
	
	wp_register_script('jquery.ui.touch-punch.min.js', $pluginsurl.'/flat-ui/js/jquery.ui.touch-punch.min.js');
	wp_enqueue_script('jquery.ui.touch-punch.min.js');
	
	wp_register_script('bootstrap.min.js', $pluginsurl.'/flat-ui/js/bootstrap.min.js');
	wp_enqueue_script('bootstrap.min.js');
	
	wp_register_script('bootstrap-select.js', $pluginsurl.'/flat-ui/js/bootstrap-select.js');
	wp_enqueue_script('bootstrap-select.js');
	
	wp_register_script('bootstrap-switch.js', $pluginsurl.'/flat-ui/js/bootstrap-switch.js');
	wp_enqueue_script('bootstrap-switch.js');
	
	wp_register_script('flatui-checkbox.js', $pluginsurl.'/flat-ui/js/flatui-checkbox.js');
	wp_enqueue_script('flatui-checkbox.js');
	
	wp_register_script('flatui-radio.js', $pluginsurl.'/flat-ui/js/flatui-radio.js');
	wp_enqueue_script('flatui-radio.js');
	
	wp_register_script('jquery.tagsinput.js', $pluginsurl.'/flat-ui/js/jquery.tagsinput.js');
	wp_enqueue_script('jquery.tagsinput.js');
	
	wp_register_script('jquery.placeholder.js', $pluginsurl.'/flat-ui/js/jquery.placeholder.js');
	wp_enqueue_script('jquery.placeholder.js');
	}
}
// Hook into the 'wp_enqueue_scripts' action
//add_action( 'admin_head', 'wccp_enqueue_scripts' );
add_action('admin_enqueue_scripts', 'wccp_enqueue_scripts');
//------------------------------------------------------------------------
function wpcp_disable_Right_Click()
{
global $wccp_settings;
?>
	<script id="wpcp_disable_Right_Click" type="text/javascript">
	//<![CDATA[
	document.ondragstart = function() { return false;}
	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	Disable context menu on images by GreenLava Version 1.0
	^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
	    function nocontext(e) {
	       return false;
	    }
	    document.oncontextmenu = nocontext;
	//]]>
	</script>
<?php
}
//////////////////////////////////////////////////////////////////////////////////////
function wpcp_disable_selection()
{
global $wccp_settings;
?>
<script id="wpcp_disable_selection" type="text/javascript">
		function disable_copy(hotkey)
		{
		if(!hotkey) var hotkey = document.body;
		if (typeof hotkey.onselectstart!="undefined") //For IE
			hotkey.onselectstart = function(){if (smessage != "")alert(smessage);return false;}
		else if (typeof hotkey.style.MozUserSelect!="undefined"){ //For Firefox
			hotkey.style.MozUserSelect="none";}
		else //Opera
			hotkey.onmousedown = function(){if (smessage != "")alert(smessage);return false;}
		hotkey.style.cursor = "default";
		}
		document.onselectstart = disable_copy(document.body);
		
		function disableEnterKey(e)
		{
			if (!e) var e = window.event;
			if (e.ctrlKey){
		     var key;
		     if(window.event)
		          key = window.event.keyCode;     //IE
		     else
		          key = e.which;     //firefox (97)
		     if (key == 97 || key == 65 || key == 67 || key == 99 || key == 88 || key == 120 || key == 26 || key == 86 || key == 83 || key == 43){
		          if (smessage != "")alert(smessage);
		          return false;
		     }else
		     	return true;
		     }
		}
		var smessage = "<?php echo $wccp_settings['smessage'];?>";
		document.body.onkeypress = disableEnterKey; //this disable Ctrl+A select action for firefox specially

		//disable_copy(document.body);

		//chrome + mac
		$(document).keydown(function(event) {
		if(event.which == 17) return false; //chrome ctrl key
		if(event.which == 157) return false; //mac command key
		if(event.ctrlKey) return false; //random
		});

document.onselectstart=function(){
var elemtype = event.srcElement.type;
elemtype = elemtype.toUpperCase();
	if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT") {
		return false;
	}
	else {
	 	return true;
	}
};


if (window.sidebar) {
	document.onmousedown=function(e){
		var obj=e.target;
		if (obj.tagName.toUpperCase() == 'SELECT'
			|| obj.tagName.toUpperCase() == "INPUT" 
			|| obj.tagName.toUpperCase() == "TEXTAREA" 
			|| obj.tagName.toUpperCase() == "PASSWORD") {
			return true;
		}
		else {
			return false;
		}
	};
}
document.body.style.webkitTouchCallout='none';

</script>
<?php
}
//------------------------------------------------------------------------
function wccp_css_script()
{
?>
			<style>
			.unselectable
			{
		    -moz-user-select:none;
		    -webkit-user-select:none;
			}
			</style>
			<script id="wpcp_css_disable_selection" type="text/javascript">
			var e = document.getElementsByTagName('body')[0];
			e.setAttribute('unselectable',on);
			</script>
<?php
}
//------------------------------------------------------------------------
function wccp_css_settings()
{
	global $wccp_settings;
	if(!is_user_logged_in() || (is_user_logged_in() && $wccp_settings['exclude_admin_from_protection'] == 'No')){
			if (((is_home() || is_front_page()) && $wccp_settings['home_css_protection'] == 'Enabled'))
			{
				wccp_css_script();
				return;
			}
			if (is_single() && $wccp_settings['posts_css_protection'] == 'Enabled')
			{
				wccp_css_script();
				return;
			}
			if (is_page() && !is_front_page() && $wccp_settings['pages_css_protection'] == 'Enabled')
			{
				wccp_css_script();
				return;
			}
	}
}
//------------------------------------------------------------------------
function wccp_main_settings()
{
	global $wccp_settings;
	if(!is_user_logged_in() || (is_user_logged_in() && $wccp_settings['exclude_admin_from_protection'] == 'No')){
			if (((is_home() || is_front_page()) && $wccp_settings['home_page_protection'] == 'Enabled'))
			{
				wpcp_disable_selection();
				return;
			}
			if (is_single() && $wccp_settings['single_posts_protection'] == 'Enabled')
			{
				wpcp_disable_selection();
				return;
			}
			if (is_page() && !is_front_page() && $wccp_settings['page_protection'] == 'Enabled')
			{
				wpcp_disable_selection();
				return;
			}
	}
}
//------------------------------------------------------------------------
function right_click_premium_settings()
{
	global $wccp_settings;
	if(!is_user_logged_in() || (is_user_logged_in() && $wccp_settings['exclude_admin_from_protection'] == 'No')){
			if (((is_home() || is_front_page()) && $wccp_settings['right_click_protection_homepage'] == 'checked'))
			{
				wpcp_disable_Right_Click();
				return;
			}
			if (is_single() && $wccp_settings['right_click_protection_posts'] == 'checked')
			{
				wpcp_disable_Right_Click();
				return;
			}
			if (is_page() && !is_front_page() && $wccp_settings['right_click_protection_posts'] == 'checked')
			{
				wpcp_disable_Right_Click();
				return;
			}
	}
}
//------------------------------------------------------------------------
// Add specific CSS class by filter
function wccp_class_names($classes) {
global  $wccp_settings;
if(!is_user_logged_in() || (is_user_logged_in() && $wccp_settings['exclude_admin_from_protection'] == 'No'))
	{
			if ($wccp_settings['home_css_protection'] == 'Enabled' || $wccp_settings['posts_css_protection'] == 'Enabled' ||  $wccp_settings['pages_css_protection'] == 'Enabled')
			{
				$classes[] = 'unselectable';
				return $classes;
			}
			else
			{
				$classes[] = 'none';
				return $classes;
			}
	}else
	{
		$classes[] = 'none';
		return $classes;
	}
}
//------------------------------------------------------------------------
add_action('wp_footer','wccp_main_settings');
add_action('wp_footer','right_click_premium_settings');
add_action('wp_head','wccp_css_settings');
add_filter('body_class','wccp_class_names');
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
			'single_posts_protection' => 'Enabled', // prevent content copy, take 3 parameters, 1.content: to prevent content copy only	2.all 	3.none
			'home_page_protection' => 'Enabled', //
			'page_protection' => 'Enabled', //
			'right_click_protection_posts' => 'checked', //
			'right_click_protection_homepage' => 'checked', //
			'right_click_protection_pages' => 'checked', //
			'home_css_protection' => 'Enabled', // free option
			'posts_css_protection' => 'Enabled', // premium option
			'pages_css_protection' => 'Enabled', // premium option
			'show_protection_info' => 'No', // about the plugin
			'exclude_admin_from_protection' => 'No',
			'img' => '',
			'a' => '',
			'pb' => '',
			'input' => '',
			'h' => '',
			'textarea' => '',
			'emptyspaces' => '',
			'smessage' => 'Content is protected !!',
			'alert_msg_img' => '',
			'alert_msg_a' => '',
			'alert_msg_pb' => '',
			'alert_msg_input' => '',
			'alert_msg_h' => '',
			'alert_msg_textarea' => '',
			'alert_msg_emptyspaces' => ''
		);
	return $wccp_settings;
}
//------------------------------------------------------------------------
function wccp_options_page_pro() {
     include 'admin-core.php';
}
//------------------------------------------------------------------------
//Make our function to call the WordPress function to add to the correct menu.
function wccp_add_options() {
	add_options_page('WP Content Copy Protection', 'WP Content Copy Protection', 'manage_options', 'wccpoptionspro', 'wccp_options_page_pro');
}
//First use the add_action to add onto the WordPress menu.
add_action('admin_menu', 'wccp_add_options');
?>