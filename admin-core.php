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
</style>
<div id="donate">
<table border="0" width="100%" cellspacing="0" cellpadding="0" dir="ltr" height="88">
	<tr>
		<td align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></td>
		<td>OR
		<a href="http://www.wp-buy.com/product/wp-content-copy-protection-pro/">
		download WP Content Copy Protection (pro)</a> version to get the full 
		control</td>
	</tr>
</table>
<div style="width: 6px; height: 0px"></div></div>
<div id="aio_admin_main">
<form method="POST">
<input type="hidden" value="update" name="action">
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

	<p align="left">
				<input type="submit" value="     Save Settings     " name="B4" style="width: 193; height: 29;">&nbsp;&nbsp;
	</p>

	<p>&nbsp;</p>
</div>
&nbsp;</td>
	</tr>
</table>

<p>
	</li></p>
</form></div>
<p>&nbsp;</p>