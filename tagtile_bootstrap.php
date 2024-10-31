<?php
require_once 'tagtile_route.php';
require_once 'tagtile_config.php';


add_action('admin_menu', 'tagtile_add_admin_pages');
add_action('widgets_init', 'tagtile_widget_init');

function tagtile_add_admin_pages() 
{
    add_options_page('Плитка тегов', 'Плитка тегов', 'delete_others_pages', 'tagtile', 'tagtile_run');
}
function tagtile_run()
{

	TagTileRoute::start();	
}

function tagtile_widget_init() {
    function tagtile_widget_view() {
        TagTileRoute::start('catalog_tagtile');
    }

    function tagtile_widget_control() {
    }

	wp_register_sidebar_widget('tagtile-links_list', 'Tags tile', 'tagtile_widget_view');
	wp_register_widget_control('tagtile-links_list', 'Tags tile', 'tagtile_widget_control' );
}
?>