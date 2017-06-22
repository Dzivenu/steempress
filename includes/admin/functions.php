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

function sp_plugin_url( $path = '' ) {
	$url = plugins_url( $path, SP_PLUGIN );

	if ( is_ssl() && 'http:' == substr( $url, 0, 5 ) ) {
		$url = 'https:' . substr( $url, 5 );
	}

	return $url;
}

function sp_get_options() {
    static $options;

    if (!$options) {
        $defaults = require SP_PLUGIN_DIR . '/config/default-settings.php';
        $options = (array)get_option('sp', array());
        $options = array_merge($defaults, $options);
    }

    /**
     * Filters the SteemPress settings (general).
     *
     * @param array $options
     */
    return apply_filters('sp_settings', $options);
}
