<?php
//define all variables the needed alot
include 'the_globals.php';
if($_POST["action"] == 'update')
{
	//----------------------------------------------------list the options array values
	$single_posts_protection = $_POST["single_posts_protection"];
	$css_protection = $_POST["css_protection"];
	$home_page_protection = $_POST["home_page_protection"];
	$show_protection_info = $_POST["show_protection_info"];
	$protect_admin = $_POST["protect_admin"];
	
	$img = $_POST["img"];
	$a = $_POST["a"];
	$pb = $_POST["pb"];
	$input = $_POST["input"];
	$h= $_POST["h"];
	$textarea = $_POST["textarea"];
	$emptyspaces = $_POST["emptyspaces"];
	
	$smessage = $_POST["smessage"];
	$alert_msg_img = $_POST["alert_msg_img"];
	$alert_msg_a = $_POST["alert_msg_a"];
	$alert_msg_pb = $_POST["alert_msg_pb"];
	$alert_msg_input = $_POST["alert_msg_input"];
	$alert_msg_h = $_POST["alert_msg_h"];
	$alert_msg_textarea = $_POST["alert_msg_textarea"];
	$alert_msg_emptyspaces = $_POST["alert_msg_emptyspaces"];

	//----------------------------------------------------Get the  options array values
	$wccp_settings = 
	Array (
			'single_posts_protection' => $single_posts_protection, // prevent content copy, take 2 parameters
			'css_protection' => $css_protection, // PROTECTION BY CSS TECHNIQUES
			'home_page_protection' => $home_page_protection, // PROTECT THE HOME PAGE OR NOT
			'show_protection_info' => $show_protection_info, // about the plugin
			'protect_admin' => $protect_admin,
			'img' => $img,
			'a' => $a,
			'pb' => $pb,
			'input' => $input,
			'h' => $h,
			'textarea' => $textarea,
			'emptyspaces' => $emptyspaces,
			'smessage' => $smessage,
			'alert_msg_img' => $alert_msg_img,
			'alert_msg_a' => $alert_msg_a,
			'alert_msg_pb' => $alert_msg_pb,
			'alert_msg_input' => $alert_msg_input,
			'alert_msg_h' => $alert_msg_h,
			'alert_msg_textarea' => $alert_msg_textarea,
			'alert_msg_emptyspaces' => $alert_msg_emptyspaces
		);
		if ($wccp_settings != '' ) {
		    update_option( 'wccp_settings' , $wccp_settings );
		} else {
		    $deprecated = ' ';
		    $autoload = 'no';
		    add_option( 'wccp_settings', $wccp_settings, $deprecated, $autoload );
		}
}else //no update action
{
	$wccp_settings = wccp_read_options();
}

?>
<style>
#aio_admin_main {
text-align:left;
direction:ltr;
padding:10px;
margin: 10px;
background-color: #ffffff;
border:1px solid #EBDDE2;
display: relative;
overflow: auto;
}
.inner_block{
height: 370px;
display: inline;
min-width:770px;
}
#donate{
    background-color: #EEFFEE;
    border: 1px solid #66DD66;
    border-radius: 10px 10px 10px 10px;
    height: 58px;
    padding: 10px;
    margin: 15px;
    }
.text-font {
    color: #1ABC9C;
    font-size: 14px;
    line-height: 1.5;
    padding-left: 3px;
    transition: color 0.25s linear 0s;
}
.text-font:hover {
    opacity: 1;
    transition: color 0.25s linear 0s;
}
.simpleTabsContent{
	border: 1px solid #E9E9E9;
	padding: 4px;
	overflow: hidden;
}
div.simpleTabsContent{
	margin-top:0;
}
#sell-message{
	margin-top: 10px;
	background-color: #FFFFFF;
    border-left: 4px solid #7AD03A;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
    padding: 1px 12px;
    color: #444444;
    width: 520px;
}
</style>
<!-- SimpleTabs -->
	<script type="text/javascript" src="<?php echo $pluginsurl; ?>/js/simpletabs_1.3.js"></script>
	<style type="text/css" media="screen">
		@import "<?php echo $pluginsurl; ?>/css/simpletabs.css";
	</style>
<!-- /SimpleTabs -->
    <!-- Loading Bootstrap -->
    <link href="<?php echo $pluginsurl; ?>/flat-ui/css/bootstrap.css" rel="stylesheet">
	<!-- Loading Flat UI -->
    <link href="<?php echo $pluginsurl; ?>/flat-ui/css/flat-ui.css" rel="stylesheet">
	<!-- Load JS here for greater good =============================-->
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/bootstrap.min.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/bootstrap-select.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/bootstrap-switch.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/flatui-checkbox.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/flatui-radio.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/jquery.tagsinput.js"></script>
    <script src="<?php echo $pluginsurl; ?>/flat-ui/js/jquery.placeholder.js"></script>
<div id="sell-message"><p><strong><a href="http://www.wp-buy.com/product/wp-content-copy-protection-pro/">
		download WP Content Copy Protection (pro)</a> version to get the full 
		control</strong></p>
<p>Want to thank us? give us a good rating
<a href="http://wordpress.org/plugins/advanced-css3-related-posts-widget/">here</a></p></div>
<div id="aio_admin_main">
<form method="POST">
<input type="hidden" value="update" name="action">
<div class="simpleTabs">
<ul class="simpleTabsNavigation">
    <li><a href="#">Main Settings</a></li>
	<li><a href="#">Premium Settings</a></li>
    <li><a href="#">About</a></li>
</ul>
<div class="simpleTabsContent">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="77%">

<div class="inner_block">
	<h4>WP Content Copy Protection:</h4>
	<p><font face="Tahoma" size="2">This wp plugin protect the posts content from being copied by any other 
	web site author , you dont want your content to spread without your 
	permission!!</font></p>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="60%">
	<div style="height: 284px; float: left;padding: 4px" id="layer3">
		<table border="0" width="100%" height="270" cellspacing="0" cellpadding="0">
			<tr>
				<td width="221" height="33"><font face="Tahoma" size="2"><b>Posts</b> Protection</font></td>
				<td>
				<select size="1" name="single_posts_protection">
				<?php 
				if ($wccp_settings['single_posts_protection'] == 'Enabled')
					{
						echo '<option selected>Enabled</option>';
						echo '<option>Disabled</option>';
					}
					else
					{
						echo '<option>Enabled</option>';
						echo '<option selected>Disabled</option>';
					}
				?>
				</select>
				</td>
				<td align="left">
				<p><font face="Tahoma" size="2">&nbsp;For single posts content</font></p></td>
			</tr>
			<tr>
				<td width="221" height="33"><font face="Tahoma" size="2"><b>Home Page</b> Protection</font></td>
				<td>
				<select size="1" name="home_page_protection">
				<?php 
				if ($wccp_settings['home_page_protection'] == 'Enabled')
					{
						echo '<option selected>Enabled</option>';
						echo '<option>Disabled</option>';
					}
					else
					{
						echo '<option>Enabled</option>';
						echo '<option selected>Disabled</option>';
					}
				?>
				</select>
				</td>
				<td align="left">
				<p><font face="Tahoma" size="2">&nbsp;Dont copy any thing! 
				even from my homepage</font></td>
			</tr>
			<tr>
				<td width="221" height="33"><font face="Tahoma" size="2">Protection by <b>CSS</b></font></td>
				<td>
				<select size="1" name="css_protection">
				<?php 
				if ($wccp_settings['css_protection'] == 'Enabled')
					{
						echo '<option selected>Enabled</option>';
						echo '<option>Disabled</option>';
					}
					else
					{
						echo '<option>Enabled</option>';
						echo '<option selected>Disabled</option>';
					}
				?>
				</select>
				</td>
				<td align="left">
				<p><font face="Tahoma" size="2">&nbsp;Using CSS special code 
				to protect the content without JavaScript</font></td>
			</tr>
			<tr>
				<td width="221" height="33"><font face="Tahoma" size="2">Right Click protection</font></td>
				<td>
				<select size="1" name="D1">
				<option selected value="Customized">Customized</option>
				</select></td>
				<td align="left">
				<p><font face="Tahoma" size="2">&nbsp;Use Premium Settings tab to 
				Customize its options</font></td>
			</tr>
			</table></div>
			</td>
			</tr>
	</table>
</div>
</td>
	</tr>
</table></div>
<div class="simpleTabsContent">
	<h4>WP Content Copy Protection (<font color="#008000">Premium options</font>):</h4>
	<div style="width: 98%;min-width:800px; height: auto; float: left; padding: 4px" id="layer4">
		<p style="text-align: center">
		<img class="decoded overflowing" alt="http://www.wp-buy.com/wp-content/uploads/2014/01/screenshot-1.png" src="http://www.wp-buy.com/wp-content/uploads/2014/01/screenshot-1.png"></p>
		<p style="text-align: center"><b>
		<a href="http://www.wp-buy.com/product/wp-content-copy-protection-pro/">
		<font size="7">Preview</font></a></b></p>
		<p style="text-align: center">&nbsp;</div>

</div>
<div class="simpleTabsContent" style="border: 1px solid #E9E9E9; padding: 4px" id="layer1">

		<h6 class="text-font">About WP Content Copy Protection:</h6>
		<p><font face="Tahoma" style="font-size: 10pt">This wp plugin protect the posts content from being copied by any 
		other web site author , you dont want your content to spread without 
		your permission!!</font></p>
		<h6 class="text-font">Description:</h6>
		<p><font face="Tahoma" style="font-size: 10pt">This wp plugin protect the posts content from being copied by any 
		other web site author , you dont want your content to spread without 
		your permission!!</font></p>
		<h6 class="text-font">Improve your seo score in Google and Yahoo and other SE's:</h6>
		<p><font face="Tahoma" style="font-size: 10pt">Our plugin protect your content from being copied by any other web 
		sites so your posts will still uniqe content, this is the best option 
		for seo</font></p>
		<h6 class="text-font">Don't Let Your Stories Go to web thief !</h6>
		<p><font face="Tahoma" style="font-size: 10pt">The plugin will keep your posts and home page protected by multiple 
		techniques (JavaScript + CSS), this techniques does not found in any 
		other wordpress plugin and you will own it for free with this plugin</font></p>
		<h6 class="text-font">Easy to Install:</h6>
		<p><font face="Tahoma" style="font-size: 10pt">Read the installation steps to find that this plugin does not need 
		any coding or theme editing, just use your mouse..</font></div>
<!-- new tab -->
<div class="simpleTabsContent" style="border: 1px solid #E9E9E9; padding: 4px">
	</div>
<!-- /new tab -->
</div><!-- simple tabs div end -->

<p align="right"><input class="btn btn-success" type="submit" value="   Save Settings   " name="B4" style="width: 193; height: 29;">&nbsp;&nbsp;</p>
</form></div>
