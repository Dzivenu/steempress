<?php

/**
* Plugin Name: SteemPress
* Plugin URI: http://steempress.amexpertsonline.com
* Description: Plugin for wordpress that integrates with steem
* Version: 0.1.1
* Author: Adam Martin
* Author URI: http://www.amexpertsonline.com
* License: GPLv3 or later
*/

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
define( 'SP_VERSION', '0.1' );
define( 'SP_PLUGIN', __FILE__ );
define( 'SP_PLUGIN_DIR', untrailingslashit( dirname( SP_PLUGIN ) ) );

require_once SP_PLUGIN_DIR . '/main.php';
