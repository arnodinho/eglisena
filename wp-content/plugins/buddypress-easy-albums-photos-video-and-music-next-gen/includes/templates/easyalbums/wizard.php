<?php get_header() ?>
<script type="text/javascript">
jQuery(function(){
	jQuery(".easyalbums_title").click(function(){
		jQuery(this).hide();
		jQuery("#title-field").show().find("input").focus();
		return false;
	});
	jQuery("#title-field input").blur(function(){
		jQuery("#title-field").hide();
		jQuery(".easyalbums_title").text(jQuery(this).val()).show();
	});

	jQuery(".easyalbums_dropdown-trigger").click(function(){
		jQuery(this).parents(".easyalbums_dropdown").find(".easyalbums_dropdown-values").show("fast");
		jQuery(".easyalbums_dropdown-fader").show();
		return false;
	});
	jQuery(".easyalbums_dropdown-fader").click(function(){
        jQuery(".easyalbums_dropdown-fader").hide();
        jQuery(".easyalbums_dropdown-values").fadeOut("fast");
        return false;
    });
    jQuery(".easyalbums_dropdown-item").click(function(){
        var id = jQuery(this).attr("id").replace("visibility-", "");
        jQuery("input[name='cp_gallery_type']").val(id);
        jQuery(this).parents(".easyalbums_dropdown").find(".easyalbums_dropdown-title").text(jQuery(this).text());
        jQuery(".easyalbums_dropdown-fader").click();
        return false;
    });
});
</script>
<div class="easyalbums_dropdown-fader" style="display: none;"></div>
	<div id="content">
		<div class="padder">
			<div id="item-header">
				<?php locate_template( array( 'members/single/member-header.php' ), true ) ?>
			</div>

			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav">
					<ul>
						<?php bp_get_displayed_user_nav() ?>
					</ul>
				</div>
			</div>

			<div id="item-body">
				<?php 
					global $bp;
					$url = "http://www.cincopa.com/media-platform/api/edit_gallery.aspx?fid=".$bp->easyalbums->currentAlbum."&uid=".$bp->easyalbums->cincopaId."&sig=".$bp->easyalbums->sig;
				    
					if ("create" != $_GET['action']) {?>
					<div style='float:right;margin-top:10px;'>
						<a href='<?php printf( '%s', wp_nonce_url( bp_displayed_user_domain() . bp_current_component(), 'bp_easyalbums' ) ) ?>' ><?php _e('Back to albums >','bp-easyalbums')?></a>
					</div>
				<?php } 
				
				global $bp;
				
				$priv_str = array(
					0 => __('Public','bp-easyalbum'),
					2 => __('Registered members','bp-easyalbum'),
					4 => __('Only friends','bp-easyalbum'),
					6 => __('Private','bp-easyalbum'),
				);
				
				$aID = $bp->easyalbums->currentAlbum;
				$uID = $bp->loggedin_user->id;
				
				if (!empty($aID)) {
					$sql = "SELECT * FROM {$bp->easyalbums->table_name} WHERE fID='$aID' AND uID='$uID' AND status='1' ORDER BY ID";
					$result = $wpdb->get_results( $sql );
					$row = $result[0];
					
					$gal_title = htmlentities(stripslashes($row->gal_title),ENT_QUOTES);
					$gal_type = $row->gal_type;
					$form_action = $bp->easyalbums->rename_action;
					$published = $row->published;
				} else {
					$gal_title = "";
					$gal_type = "0";
					$form_action = $bp->easyalbums->create_action;
					$published = false;
				}
                ?>
				
				<form method="post" enctype="multipart/form-data" action='<?php printf(  '%s', wp_nonce_url( bp_displayed_user_domain() . bp_current_component(), 'bp_easyalbums_screen_delete' ) ) ?>' name="bp-easyalbum-upload-form" id="bp-easyalbum-upload-form" class="standard-form">
				<input type="hidden" name="action" value="<?php echo $form_action ?>" />
				<input type='hidden' name='easyalbums_fid' value='<?php echo $aID?>' />
			
                <div class="easyalbums_title"><?php echo $gal_title?></div>
                <div class="clear"></div>
            	<div class='easyalbums_formField' id="title-field" style="display: none;">
					<input type='text' name='cp_gallery_title' value='<?php echo $gal_title?>' class='easyalbums_input'/>
					<div class='void'></div>
				</div>
				<iframe style='width: 700px; height: 500px; margin-left: 5%;' src='<?php echo $url ?>'></iframe>
				<div class="clear"></div>
				
				<div class="easyalbums_options">
				<div class='easyalbums_visibility_row'>
				<label><input type="checkbox" name="cp_publish" <?php if ($published) :?>checked="checked"<?php endif?> value="1" />&nbsp;Publish to activity</label>
				</div>
				
				<div class='easyalbums_visibility_row'>
				    <input type="hidden" name="cp_gallery_type" value="<?php echo $gal_type?>" />
               		<label class='easy_albums_label' id="visibility-label"><?php _e('Visibility','bp-easyalbum') ?></label>
					<div class="easyalbums_dropdown">
                        <a href="#" class="easyalbums_dropdown-trigger">
                            <span class="easyalbums_dropdown-title"><?php echo $priv_str[$gal_type]?></span>
                        </a>
                        <div class="easyalbums_dropdown-values" style="display: none;">
                            <?php foreach ($priv_str as $k => $str): ?>
                            <a href="#" id="visibility-<?php echo $k?>" class="easyalbums_dropdown-item"><?php echo $str?></a>
                            <?php endforeach?>
                        </div>
                    </div>
					<div class='void'></div>
            	</div>
            	
           		<div class="easyalbums_buttons"><input type="submit" name="submit" id="submit" value="<?php _e( 'Save', 'bp-easyalbum' ) ?>"/></div>
           		</div>
                <div class="clear"></div>
                <?php
                    wp_nonce_field( 'bp-easyalbum-create' );
                ?>
                </form>
			</div><!-- #item-body -->
		</div><!-- .padder -->
	</div><!-- #content -->
	<?php locate_template( array( 'sidebar.php' ), true ) ?>
<?php get_footer() ?>