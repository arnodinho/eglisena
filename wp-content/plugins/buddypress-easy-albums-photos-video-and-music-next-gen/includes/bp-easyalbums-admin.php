<?php

/***
* This file is used to add site administration menus to the WordPress backend.
*
* If you need to provide configuration options for your component that can only
* be modified by a site administrator, this is the best place to do it.
*
* However, if your component has settings that need to be configured on a user
* by user basis - it's best to hook into the front end "Settings" menu.
*/

/**
* bp_easyalbums_admin()
*
* Checks for form submission, saves component settings and outputs admin screen HTML.
*/



function bp_easyalbums_admin() {
global $bp;

/* If the form has been submitted and the admin referrer checks out, save the settings */
if ( isset( $_POST['submit'] ) && check_admin_referer('easyalbums-settings') ) {
	update_site_option( 'bp_cp_uid', trim($_POST['bp_cp_uid']) );
	update_site_option( 'bp_cp_secret', trim($_POST['bp_cp_secret']) );
	
	$tabs = array();
	if (isset($_POST['bp_easyalbums_tabs'])) {
	    foreach ($_POST['bp_easyalbums_tabs'] as $tab) {
	        $id = trim($tab['id']);
	        $slug = trim($tab['slug']);
	        $title = trim($tab['title']);
	        $template = trim($tab['template']);
	        if (!empty($id) && !empty($slug) && !empty($title) && !empty($template)) {
	            $tabs[] = $tab;
	        }
	    }
	}
	update_site_option( 'bp_easyalbums_tabs', $tabs );

	$updated = true;
	if (get_site_option('bp_easyalbums_activated') != 'true')
	{
		update_site_option('bp_easyalbums_activated', 'true');
		echo "<img src='http://goo.gl/UUTGu' width=0 height=0 />";			
		
	}
}

if ( isset($updated) ) {
	$err .=  __( 'Settings Updated.', 'bp-easyalbums' );
	$err .= "<br/>";
};

$secret = get_site_option('bp_cp_secret');
$cpr 	= new cpRequest($secret);
$cpr->Add("uid", get_site_option('bp_cp_uid'));
$cpr->Add("cmd", "validateaccount");
try{
	$res 	= $cpr->GetResponse();
	$xml 	= new SimpleXMLElement($res);
	if ($xml->result=="ok"){
		$err	.= "Hooray! Your Cincopa username and secret key seems to be valid";
		if (get_site_option('bp_easyalbums_activated') != 'true'){
			update_site_option('bp_easyalbums_activated', 'true');
			echo "<img src='http://goo.gl/UUTGu' width=0 height=0 />";			
			
		}
	}else{
		switch ($xml->error->code){
			
			case "signatureerror":
				$err	.= "The Key is not valid, get a <a href='http://www.cincopa.com/media-platform/api/get_api_key.aspx?afc=easyalbums' target='_blank'>new key here</a> ";
			break;
			case "userloginnotvalid":
				$err	.= "The username is not valid, <a href='http://www.cincopa.com?afc=easyalbums' target='_blank'>Sign up here</a> ";
			break;
			case "passwordnotvalid":
				$err	.= "The Key is not valid, this is probably since you've entered the wrong password <a href='http://www.cincopa.com/media-platform/api/get_api_key.aspx?afc=easyalbums' target='_blank'>on this page</a> ";
			break;
			case "ok":
				
			break;
		
		}
	}
	
}catch (Exception $e) {
	$err	.= _e("There was an error validating you Cincopa secret Key","bp-easyalbums");
}

$setting_one = get_site_option( 'bp_cp_uid' );
$setting_two = get_site_option( 'bp_cp_secret' );
$plugin_tabs = get_site_option( 'bp_easyalbums_tabs' );
?>
<script type="text/javascript">
jQuery(document).ready( function() {
	jQuery("#add-tab").click(function(){
		var form = jQuery(this).parents("#easyalbums-settings-form");
		var name = form.find(".ea-row-slug:last input").attr("name");
		var counter = parseInt(name.replace("bp_easyalbums_tabs[", "").replace("][slug]", "")) + 1;
		
		var newLine = form.find(".ea-row-line:last").clone();
		var newNumber = form.find(".ea-row-number:last").clone();
		var newId = form.find(".ea-row-id:last").clone().find("input").val("").attr("name", "bp_easyalbums_tabs["+counter+"][id]").end();
		var newSlug = form.find(".ea-row-slug:last").clone().find("input").val("").attr("name", "bp_easyalbums_tabs["+counter+"][slug]").end();
		var newTitle = form.find(".ea-row-title:last").clone().find("input").val("").attr("name", "bp_easyalbums_tabs["+counter+"][title]").end();
		var newTemplate = form.find(".ea-row-template:last").clone().find("input").val("AEAAqSaD_z3h").attr("name", "bp_easyalbums_tabs["+counter+"][template]").end();
		
		newNumber.find(".tab-number").text(parseInt(newNumber.find(".tab-number").text()) + 1);
		form.find(".ea-row-template:last").after(newLine, newNumber, newId, newSlug, newTitle, newTemplate);
		return false;
	});
});
</script>
<div class="wrap">
	<h2><?php _e( 'Easyalbums Admin', 'bp-easyalbums' ) ?></h2>
	<?php if (!empty($err)) {?>
		<div id="message" class="updated fade">
			<p style="line-height: 150%">
				<?php echo $err ?>
			</p>
		</div>
	<?php } ?>
	
	<br />

	<form action="<?php echo site_url() . '/wp-admin/admin.php?page=bp-easyalbums-settings' ?>" name="easyalbums-settings-form" id="easyalbums-settings-form" method="post">

		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="target_uri"><?php _e( 'Cincopa username', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_cp_uid" type="text" id="bp_cp_uid" value="<?php echo attribute_escape( $setting_one ); ?>" size="60" />
					<br/><?php _e("Don't have an account?","bp-easyalbums")?> <a href='http://www.cincopa.com?afc=easyalbums' target='_blank'><?php _e("Sign up here","bp-easyalbums")?></a><?php _e("(it's fast and free)","bp-easyalbums")?>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="target_uri"><?php _e( 'Cincopa API secret', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_cp_secret" type="text" id="bp_cp_secret" value="<?php echo attribute_escape( $setting_two ); ?>" size="60" /> 
					<br/><a href='http://www.cincopa.com/media-platform/api/get_api_key.aspx?afc=easyalbums' target="_blank"><?php _e("Get Key","bp-easyalbums")?></a>
				</td>
			</tr>
		<?php if (count($plugin_tabs) > 0) {?>
			<?php $i = 1?>
			<?php foreach ($plugin_tabs as $tab) {?>
			<tr class="ea-row-line">
                <td colspan="2"><hr /></td>
			</tr>
			<tr class="ea-row-number">
                <td colspan="2"><b>Tab <span class="tab-number"><?php echo $i?></span></b></td>
			</tr>
			<tr class="ea-row-id">
				<th scope="row"><label for="target_uri"><?php _e( 'Tab ID', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_easyalbums_tabs[<?php echo $i?>][id]" type="text" id="bp_easyalbums_id" value="<?php echo $tab['id']?>" size="60" />
					<br/><a href='http://help.cincopa.com/forums/20839975-BuddyPress-Guides' target='_blank'><?php _e("What is this number?")?></a>
				</td>
			</tr>
			<tr class="ea-row-slug">
				<th scope="row"><label for="target_uri"><?php _e( 'Tab Slug', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_easyalbums_tabs[<?php echo $i?>][slug]" type="text" id="bp_easyalbums_slug" value="<?php echo $tab['slug']?>" size="60" />
				</td>
			</tr>
			<tr class="ea-row-title">
				<th scope="row"><label for="target_uri"><?php _e( 'Tab title', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_easyalbums_tabs[<?php echo $i?>][title]" type="text" id="bp_easyalbums_tab" value="<?php echo $tab['title']?>" size="60" />
					<br/><?php _e("The title for the tab on the user's profile page","bp-easyalbums");?>
				</td>
			</tr>
			<tr class="ea-row-template">
				<th scope="row"><label for="target_uri"><?php _e( 'Default template', 'bp-easyalbums' ) ?></label></th>
				<td>
				    <input name="bp_easyalbums_tabs[<?php echo $i?>][template]" type="text" id="bp_easyalbums_template" value="<?php echo $tab['template']?>" size="60" />
				    <br/><a href='http://help.cincopa.com/forums/20839975-BuddyPress-Guides' target='_blank'><?php _e("You can customize how it looks")?></a>
				</td>
			</tr>
			<?php $i++?>
			<?php }?>
		<?php } else {?>
            <tr class="ea-row-line">
                <td colspan="2"><hr /></td>
			</tr>
			<tr class="ea-row-number">
                <td colspan="2"><b>Tab <span class="tab-number">1</span></b></td>
			</tr>
			<tr class="ea-row-id">
				<th scope="row"><label for="target_uri"><?php _e( 'Tab ID', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_easyalbums_tabs[1][id]" type="text" id="bp_easyalbums_id" value="" size="60" />
					<br/><a href='http://help.cincopa.com/forums/20839975-BuddyPress-Guides' target='_blank'><?php _e("What is this number?")?></a>
				</td>
			</tr>
            <tr class="ea-row-slug">
				<th scope="row"><label for="target_uri"><?php _e( 'Tab Slug', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_easyalbums_tabs[1][slug]" type="text" id="bp_easyalbums_slug" value="" size="60" />
				</td>
			</tr>
			<tr class="ea-row-title">
				<th scope="row"><label for="target_uri"><?php _e( 'Tab title', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_easyalbums_tabs[1][title]" type="text" id="bp_easyalbums_tab" value="" size="60" />
					<br/><?php _e("The title for the tab on the user's profile page","bp-easyalbums");?>
				</td>
			</tr>
			<tr class="ea-row-template">
				<th scope="row"><label for="target_uri"><?php _e( 'Default template', 'bp-easyalbums' ) ?></label></th>
				<td>
					<input name="bp_easyalbums_tabs[1][template]" type="text" id="bp_easyalbums_template" value="" size="60" />
					<br/><a href='http://help.cincopa.com/forums/20839975-BuddyPress-Guides' target='_blank'><?php _e("You can customize how it looks")?></a>
				</td>
			</tr>
		<?php }?>
		</table>
		<a href="#" id="add-tab">Add Tab</a>
		<p class="submit">
			<input type="submit" name="submit" value="<?php _e( 'Save Settings', 'bp-easyalbums' ) ?>"/>
		</p>

		<?php
		/* This is very important, don't leave it out. */
		wp_nonce_field( 'easyalbums-settings' );
		?>
	</form>
</div>
<?php
}

function bp_easyalbums_activation_notice()
{ ?>
	<div id="message" class="updated fade">
		<p style="line-height: 150%">
			<strong>Welcome to Easy Albums</strong> - the easy way to manage media for Buddypress users.<br/>
			Before you can start enjoying the plugin you have to go to the setup page and enter the plug-in credentials.
		</p>
		<p>
			<input type="button" class="button" value="Easy Albums Options Page" onclick="document.location.href = 'admin.php?page=bp-easyalbums-settings';" />
			<input type="button" class="button" value="Hide this message" onclick="document.location.href = 'admin.php?page=bp-easyalbums-settings&hide_note=hide';" />
		</p>
	</div>
<?php
	if (get_site_option('bp_easyalbums_installed') != 'true'){
		echo "<img src='http://goo.gl/effsp' width=0 height=0 />"; 
		update_site_option('bp_easyalbums_installed', 'true');
	}

}

if($_GET['hide_note']=="hide"){
	update_site_option('bp_easyalbums_show_notice', BP_EASYALBUMS_VERSION);
}

if (get_site_option('bp_easyalbums_show_notice') != BP_EASYALBUMS_VERSION)
	add_action( 'admin_notices', 'bp_easyalbums_activation_notice' );


?>