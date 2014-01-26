<?php
//define all variables the needed alot
include 'the_globals.php';
if($_POST["action"] == 'update')
{
	//----------------------------------------------------list the options array values
	$single_posts_protection = $_POST["single_posts_protection"];
	$right_click_by_mouse_protection = $_POST["right_click_by_mouse_protection"];
	$css_protection = $_POST["css_protection"];
	$home_page_protection = $_POST["home_page_protection"];
	$show_protection_info = $_POST["show_protection_info"];
	//----------------------------------------------------Get the  options array values
	$wccp_settings = 
	Array (
			'single_posts_protection' => $single_posts_protection, // prevent content copy, take 2 parameters
			'right_click_by_mouse_protection' => $right_click_by_mouse_protection, // Prevent Right Click By Mouse
			'css_protection' => $css_protection, // PROTECTION BY CSS TECHNIQUES
			'home_page_protection' => $home_page_protection, // PROTECT THE HOME PAGE OR NOT
			'show_protection_info' => $show_protection_info // about the plugin
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
<div id="sell-message"><p><strong><a href="http://www.wp-buy.com/product/wp-content-copy-protection-pro/">
		download WP Content Copy Protection (pro)</a> version to get the full 
		control</strong></p></div>
<div id="aio_admin_main">
<form method="POST">
<input type="hidden" value="update" name="action">
<div class="simpleTabs">
<ul class="simpleTabsNavigation">
    <li><a href="#">Main Settings</a></li>
	<li><a href="#">Premium Settings</a></li>
    <li><a href="#">About</a></li>
</ul>
<div class="simpleTabsContent" style="border: 1px solid #E9E9E9; padding: 4px">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="77%">
<div class="inner_block">
	<h2>WP Content Copy Protection:</h2>
	<p>This wp plugin protect the posts content from being copied by any other 
	web site author , you dont want your content to spread without your 
	permission!!</p>
	<p><?php echo "<img style='float:right;' src='$pluginsurl/images/logo.png' align='center' />";?></p>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="60%">
		<div><font color="#C47500"><b>Change Options as You Like:</b></font></div>
	<div style="width: 603px; height: 284px; float: left; border: 1px solid #E9E9E9; padding: 4px" id="layer3">
		<table border="0" width="100%" height="270" cellspacing="0" cellpadding="0">
			<tr>
				<td width="221"><b>Posts</b> Protection</td>
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
				<td width="212">
				<p align="center"><font color="#008000">For single posts content</font></td>
			</tr>
			<tr>
				<td width="221"><b>Right click </b>(by mouse) Protection</td>
				<td><select size="1" name="right_click_by_mouse_protection">
				<?php 
				if ($wccp_settings['right_click_by_mouse_protection'] == 'Enabled')
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
				</select></td>
				<td width="212">
				<p align="center"><font color="#008000">disallow right mouse 
				click to prevent saving images</font></td>
			</tr>
			<tr>
				<td width="221">Protection by <b>CSS</b></td>
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
				<td width="212">
				<p align="center"><font color="#008000">Using CSS special code 
				to protect the content without JavaScript</font></td>
			</tr>
			<tr>
				<td width="221"><b>Home Page</b> Protection</td>
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
				<td width="212">
				<p align="center"><font color="#008000">Dont copy any thing! 
				even from my homepage</font></td>
			</tr>
			<tr>
				<td colspan="3">
				<a href="http://www.wp-buy.com/product/wp-content-copy-protection-pro/">
				download WP Content Copy Protection (<font color="#008000">pro</font>)</a> 
				version to get the full control</td>
			</tr>
			</table></div>

				<p>&nbsp;</td>
			</tr>
	</table>

</div>
&nbsp;</td>
	</tr>
</table>
</div>
<div class="simpleTabsContent" style="border: 1px solid #E9E9E9; padding: 4px">
<p><?php echo "<img src='$pluginsurl/images/premium.png' align='center' />";?></p>
</div>
<div class="simpleTabsContent" style="height: 467px; border: 1px solid #E9E9E9; padding: 4px" id="layer1">

		<h2>About WP Content Copy Protection:</h2>
		<p>This wp plugin protect the posts content from being copied by any 
		other web site author , you dont want your content to spread without 
		your permission!!</p>
		<h3>Description:</h3>
		<p>This wp plugin protect the posts content from being copied by any 
		other web site author , you dont want your content to spread without 
		your permission!!</p>
		<h3>Improve your seo score in Google and Yahoo and other SE's:</h3>
		<p>Our plugin protect your content from being copied by any other web 
		sites so your posts will still uniqe content, this is the best option 
		for seo</p>
		<h3>Don't Let Your Stories Go to web thief !</h3>
		<p>The plugin will keep your posts and home page protected by multiple 
		techniques (JavaScript + CSS), this techniques does not found in any 
		other wordpress plugin and you will own it for free with this plugin</p>
		<h3>Easy to Install:</h3>
		<p>Read the installation steps to find that this plugin does not need 
		any coding or theme editing, just use your mouse..</div>
</div><!-- simple tabs -->
<input type="submit" value="     Save Settings     " name="B4" style="width: 193; height: 29;">
</form></div>
<p>&nbsp;</p>