<?php
class CatalogControllerTagTile {
	private $language;
	private $model_tagtile;
	function __construct() {
		$_ = $data = array();

		$filename = 'tagtile.php';
		if(strpos(strtolower(get_bloginfo('language')),'ru') !== false)
			$template_language = 'ru-ru/';
		else $template_language = 'en-gb/';
		$file = TAGTILE_DIR_ADMIN_LANGUAGE .$template_language . $filename ;

		if (file_exists($file)) {
			require($file);
		}

		$this->language = array_merge($data, $_);

		require(TAGTILE_DIR_CATALOG_MODEL.'tagtile.php');
		$this->model_tagtile = new ModelTagtile();
	}
	public function index() {

		$page = $_SERVER['REQUEST_URI'];
	 	$results = $this->model_tagtile->getLinks($page);
	 	if(empty($results)) return;

		$data['show_all']                 = $this->languaget('show_all');
		$data['close_all']                = $this->languaget('close_all');
		$data['unit_rel_active_color']    = get_option('tagtile_rel_active_color');
		$data['unit_rel_hover_color']     = get_option('tagtile_rel_hover_color');
		$data['unit_border_active_color'] = get_option('tagtile_border_active_color');
		$data['unit_border_hover_color']  = get_option('tagtile_border_hover_color');
		$data['links']                    = $results;

		$this->setOutput("theme/default/tagtile.tpl", $data);
		
	}

	public function languaget($key)
	{
		return (isset($this->language[$key]) ? $this->language[$key] : $key);
	}

	public function setOutput($template,$data)
	{

		$file = TAGTILE_DIR_CATALOG_TEMPLATE . $template;
		wp_enqueue_style( 'tagtile-group-css', TAGTILE_CATALOG_DIR_STYLES.'tagtile_style.css');

		if (file_exists($file)) {
			extract($data);

			require($file);

		} else {
			trigger_error('Error: Could not load template ' . $file . '!');
			exit();
		}

	}

}?>