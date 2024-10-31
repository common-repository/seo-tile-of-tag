<?php
/**
 * @package Superdok
 * @version 1.0.7.8
 */
/*
Plugin Name: Seo Tile Of Tag - плитка тегов + filter woocommerce seo url ЧПУ
Plugin URI: https://hqline.ru/category/plitka-tegov/
Description: The module allows you to display different tags on different pages in the form of SEO tiles. The tile collapses and expands when the button is pressed. 
Version: 1.0.7.8
Author: Superdok
Author URI: http://hqline.ru/author-page/
License: GPLv2 or later
*/


/*  Copyright 2021 superdok ks0409411@gmail.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once 'tagtile_bootstrap.php';

function tagtile_install()
{
    global $wpdb;
    
    $table_links_page = $wpdb->prefix.'tagtile_links_page';

    $sql = "CREATE TABLE IF NOT EXISTS `$table_links_page` (
              `link_id` int(11) NOT NULL AUTO_INCREMENT,
              `page_type` varchar(155) NOT NULL,
              `anchor` varchar(255) NOT NULL,
              `link` varchar(455) NOT NULL,
              `page_id` bigint(11) NOT NULL,
              `url` varchar(655) NOT NULL,
                  PRIMARY KEY (`link_id`)   
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

    $wpdb->query($sql);

	add_option('tagtile_status', '1');
	add_option('tagtile_rel_active_color', '#4363a5');
	add_option('tagtile_rel_hover_color', '#4363a5');
	add_option('tagtile_border_active_color', '#4363a5');
	add_option('tagtile_border_hover_color', '#4363a5');
}

function tagtile_uninstall()
{
    global $wpdb;
    
    $table_links_page = $wpdb->prefix.'tagtile_links_page';
    
    $sql = "DROP TABLE IF EXISTS `".$table_links_page."`;";
    
    $wpdb->query($sql);
	delete_option('tagtile_status', '1');
	delete_option('tagtile_rel_active_color', '#4363a5');
	delete_option('tagtile_rel_hover_color', '#4363a5');
	delete_option('tagtile_border_active_color', '#4363a5');
	delete_option('tagtile_border_hover_color', '#4363a5');
}

register_activation_hook( __FILE__, 'tagtile_install');
register_deactivation_hook( __FILE__, 'tagtile_uninstall');
add_filter( 'plugin_action_links', function($links, $file){
    if ( $file != plugin_basename(__FILE__) ){
        return $links;
    }
    $settings_link = sprintf('<a href="%s">%s</a>', admin_url('options-general.php?page=tagtile'), 'Settings');

    array_unshift( $links, $settings_link );
    return $links;
}, 10, 2 );

?>