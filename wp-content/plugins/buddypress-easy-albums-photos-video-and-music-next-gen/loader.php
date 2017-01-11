<?php

/*
Plugin Name: Easy Albums - Buddypress users create and share images, video and audio albums - the easy way.
Plugin URI: http://buddypress.cincopa.com/
Description: Let your users upload images, manage their media and post and share it on buddypress activity stream!
Version: 1.8
Revision Date: JAN 28, 2014
Requires at least: 2.0.2
License: (Easyalbums: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html)
Author: Itay Noy, Cincopa
Author URI: http://buddypress.cincopa.com/
Site Wide Only: false
*/
define ( 'BP_EASYALBUMS_VERSION', '1.8' );


//add_action( 'bp_include', 'bp_example_init' );

function bp_easyalbums_init() {
	require( dirname( __FILE__ ) . '/includes/bp-easyalbums-core.php' );
	do_action('bp_album_init');
}
add_action( 'bp_include', 'bp_easyalbums_init' );


function bp_example_setup_root_component() {
	bp_core_add_root_component( BP_EXAMPLE_SLUG );
}


function bp_easyalbums_activate() {
	global $wpdb;

	if ( !empty($wpdb->charset) )
		$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
	
	$sql[] = "CREATE TABLE {$wpdb->base_prefix}bp_cp_galleries (
	   ID int(11) NOT NULL AUTO_INCREMENT,
	   uID varchar(255) DEFAULT NULL,
	   fID varchar(255) DEFAULT NULL,
	   tab varchar(255) DEFAULT NULL,
	   gal_type varchar(255) DEFAULT NULL,
	   gal_title varchar(255) DEFAULT NULL,
	   published int(11) DEFAULT '0',
	   dateModified timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	   status enum('1','0') DEFAULT '1',
	   PRIMARY KEY (ID),
	   KEY idx_uid (uID),
	   KEY idx_fid (fID)
	   ) ENGINE=MyISAM {$charset_collate};";

	$old_tabs = get_site_option('bp_easyalbums_tabs');
	if (!empty($old_tabs)) {
	    $i = 1;
	    foreach ($old_tabs as &$tab) {
	        if ($tab['template'] == 'audio' || $tab['template'] == 'AkIALS6N_Xrj') {
	            $tab['template'] = 'AkIALS6N_Xrj';
	        } elseif ($tab['template'] == 'video' || $tab['template'] == 'AELA3RKs_nti') {
	            $tab['template'] = 'AELA3RKs_nti';
	        } else {
	            $tab['template'] = 'AEAAqSaD_z3h';
	        }
	        if (!isset($tab['id']) || empty($tab['id'])) {
	            $tab['id'] = $i;
	            $sql[] = "UPDATE {$wpdb->base_prefix}bp_cp_galleries SET tab='{$i}' WHERE tab='{$tab['slug']}'";
	        }
	        $i++;
	    }
	    $tabs = $old_tabs;
	} else {
	    $plugin_slug = get_site_option('bp_easyalbums_slug');
	    $plugin_slug = !empty($plugin_slug) ? $plugin_slug : "albums";
	    $plugin_tab = get_site_option('bp_easyalbums_tab');
	    $plugin_tab = !empty($plugin_tab) ? $plugin_tab : "Albums";
	    $tabs = array(array(
	        'id' => 1,
	        'slug' => $plugin_slug,
	        'title' => $plugin_tab,
	        'template' => 'AEAAqSaD_z3h'
	    ));
	    $sql[] = "UPDATE {$wpdb->base_prefix}bp_cp_galleries SET tab='1'";
	}
	
	update_site_option('bp_easyalbums_tabs', $tabs);
	 
	require_once( ABSPATH . 'wp-admin/upgrade-functions.php' );

	dbDelta($sql);

	update_site_option( 'bp-easyalbums-db-version', BP_EASYALBUMS_DB_VERSION );
}
register_activation_hook( __FILE__, 'bp_easyalbums_activate' );

/* On deacativation, clean up anything your component has added. */
function bp_easyalbums_deactivate() {
	
}
register_deactivation_hook( __FILE__, 'bp_easyalbums_deactivate' );
?>