<?php

/*
  Copyright 2017 AM Experts
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once SP_PLUGIN_DIR . '/includes/admin/functions.php';
require_once SP_PLUGIN_DIR . '/includes/admin/stats-panel.php';

add_action( 'admin_enqueue_scripts', 'sp_admin_enqueue_scripts' );

function sp_admin_enqueue_scripts(){
  $modified = filemtime( SP_PLUGIN_DIR . '/css/admin/styles.css' );
  wp_enqueue_style( 'steempress-admin',
		sp_plugin_url( 'css/admin/styles.css' ),
		//array(), SP_VERSION, 'all' );
    array(), $modified, 'all' );
}

// Admin Menu
function steempress_menu() {
  add_menu_page(
    'SteemPress',             //Page Title
    'SteemPress',             //Menu Title
    'manage_options',         //Capability
    'steempress-dashboard',   //Menu Slug
    'steempress_dashboard',   //Function to be called for output
    '',
    3
  );
  add_submenu_page(
    'steempress-dashboard',   //Parent Slug
    'Dashboard',              //Page Title
    'Dashboard',              //Menu Title
    'manage_options',         //Capability
    'steempress-dashboard',   //Menu Slug
    'steempress_dashboard'   //Function to be called for output
  );
  add_submenu_page(
    'steempress-dashboard',
    'Settings',
    'Settings',
    'manage_options',
    'steempress-settings',
    'steempress_settings_page'
  );
}
add_action('admin_menu', 'steempress_menu');

function steempress_dashboard() {
    $connected = ! empty( $opts['steemit_username'] ); //refactor to a function

?>
<div class="wrap">
  <p class="breadcrumbs">
		<span class="prefix"><?php echo __( 'You are here: ', 'steempress' ); ?></span>
		<span class="current-crumb"><strong>Dashboard</strong></span>
	</p>
  <h1>SteemPress Dashboard</h1>
  <?php if( $connected ) { ?>
    <span class="notice notice-success"><?php _e( 'CONNECTED', 'steempress' ); ?></span>
  <?php } else { ?>
    <span class="notice notice-warning"><?php _e( 'NOT CONNECTED', 'steempress' ); ?></span>
  <?php } ?>
  <?php sp_stats_panel(); ?>
</div>

<?php
}

function steempress_settings_page() {
  $opts = sp_get_options();
  $connected = ! empty( $opts['steemit_username'] );



?>
<div class="wrap">
  <p class="breadcrumbs">
		<span class="prefix"><?php echo __( 'You are here: ', 'steempress' ); ?></span>
		<span class="current-crumb"><strong>Settings</strong></span>
	</p>
  <h1>SteemPress Settings</h1>
  <?php //sp_welcome_panel(); ?>
  <form action="<?php echo admin_url( 'options.php' ); ?>" method="post">
    <table class="form-table">
      <tr valign="top">
        <th scope="row">
          <?php echo __( 'Status', 'steempress'); ?>
        </th>
        <td>
          <?php if( $connected ) { ?>
            <span class="notice notice-success"><?php _e( 'CONNECTED', 'steempress' ); ?></span>
          <?php } else { ?>
            <span class="notice notice-warning"><?php _e( 'NOT CONNECTED', 'steempress' ); ?></span>
          <?php } ?>
        </td>
      </tr>

      <tr valign="top">
			  <th scope="row"><label for="steemit-username"><?php _e( 'Steemit Username', 'mailchimp-for-wp' ); ?></label></th>
				<td>
					<input type="text" class="regular-text" placeholder="<?php _e( 'Your Steemit Username', 'steempress' ); ?>" id="steemit-username" name="steemit_username" value="<?php echo get_option('steemit_username'); ?>" />
					<p class="help">
						<?php _e( 'Your username on Steemit.', 'steempress' ); ?>
						<a target="_blank" href="http://www.steemit.com"><?php _e( 'Signup to Steemit here.', 'steempress' ); ?></a>
					</p>
				</td>
			</tr>

    </table>
    <?php submit_button(); ?>
  </form>
</div>
<?php
}
