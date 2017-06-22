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

function sp_stats_panel() {

?>
<div id="welcome-panel" class="welcome-panel">
  <div class="welcome-panel-content">
		<div class="welcome-panel-column-container">

			<div class="welcome-panel-column">
				<h3><span class="dashicons dashicons-smiley"></span> <?php echo esc_html( __( "Thankyou", 'steempress' ) ); ?></h3>
				<p><?php echo esc_html( __( "For being part of the steem community.", 'steempress' ) ); ?></p>
			</div>

			<div class="welcome-panel-column">
				<h3><span class="dashicons dashicons-editor-help"></span> <?php echo esc_html( __( "Need help?", 'steempress' ) ); ?></h3>
				<p><?php echo esc_html( __( "help coming", 'steempress' ) ); ?></p>
      </div>

      <div class="welcome-panel-column">
				<h3><span class="dashicons dashicons-smiley"></span> <?php echo esc_html( __( "Thankyou", 'steempress' ) ); ?></h3>
				<p><?php echo esc_html( __( "For being part of the steem community.", 'steempress' ) ); ?></p>
			</div>

		</div>
	</div>
</div>
<?php
}
