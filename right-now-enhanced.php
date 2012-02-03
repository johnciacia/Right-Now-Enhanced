<?php
/*
Plugin Name: Right Now Enhanced
Plugin URI: https://github.com/johnciacia/Right-Now-Enhanced
Description: Display custom post types in the "Right Now" widget.
Author: John Ciacia
Version: 1.1
Author URI: http://www.johnciacia.com

Copyright 2012  John Ciacia  (email : john@johnciacia.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if( ! function_exists( 'right_now_enhanced_cpt' ) ) {
	add_action( 'right_now_content_table_end', 'right_now_enhanced_cpt');
	function right_now_enhanced_cpt() {
		$post_types = get_post_types( array( '_builtin' => false, 'public' => true ), 'objects' );
		foreach( $post_types as $type => $post_type ) {
			//It wouldn't be a bad idea to cache this result
			$num_posts = wp_count_posts( $type );
			$num = number_format_i18n( $num_posts->publish );
			?>
			<tr>
				<td class="first b b_<?php echo $type; ?>">
					<a href="<?php echo esc_attr("edit.php?post_type=$type"); ?>"><?php echo $num; ?></a>
				</td>
				<td class="t <?php echo $type; ?>">
					<a href="<?php echo esc_attr("edit.php?post_type=$type"); ?>"><?php echo esc_html($post_type->label); ?></a>
				</td>
			</tr>
			<?php
		}
	}
}
