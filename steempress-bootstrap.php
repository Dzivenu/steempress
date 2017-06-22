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

add_filter( 'plugin_action_links', 'my_add_action_links', 10, 5 );
add_filter( 'plugin_row_meta',     'my_plugin_row_meta', 10, 2 );

/**
 * my_add_action_links
 */
function my_add_action_links( $actions, $plugin_file ) {
  $action_links = array(

  'settings' => array(
    'label' => __('Settings', 'my_domain'),
    'url'   => get_admin_url(null, 'admin.php?page=steempress-settings')
  ));

  return plugin_action_links( $actions, $plugin_file, $action_links, 'before');
}

/**
 * my_plugin_row_meta
 */
function my_plugin_row_meta( $actions, $plugin_file ) {
  $action_links = array(

  'donate' => array(
    'label' => __('Donate', 'my_domain'),
    'url'   => 'http://steempress.amexpertsonline.com'
  ));

  return plugin_action_links( $actions, $plugin_file, $action_links, 'after');
}

/**
 * plugin_action_links
 */
function  plugin_action_links ( $actions, $plugin_file,  $action_links = array(), $position = 'after' ) {
  if( $plugin_file == "SteemPress/steempress.php" && !empty( $action_links ) ) {
    foreach( $action_links as $key => $value ) {
      $link = array( $key => '<a href="' . $value['url'] . '">' . $value['label'] . '</a>' );
      if( $position == 'after' ) {
        $actions = array_merge( $actions, $link );
      } else {
        $actions = array_merge( $link, $actions );
      }
    }
  }
  return $actions;
}
