<?php

class TagTileRoute
{   
	static function start($default='admin_tagtile')
	{
	    $allow_controllers=array('admincontrollertagtile','catalogcontrollertagtile');
	    $allow_actions=array('upload','index');
		// контроллер и действие по умолчанию
		$controller_name = $default;
		$action_name = 'index';
		$routes = explode('=tagtile&', $_SERVER['REQUEST_URI']);
		if(count($routes)>1){
			$routes = explode('&', $routes[1]);
			$routes = explode('/', $routes[0]);
		}else $routes =null;

		// получаем имя контроллера
		if ( !empty($routes[0]) )
		{	
			$controller_name = $routes[0];
		}
		
		// получаем имя экшена
		if ( !empty($routes[1]) )
		{
			$action_name = $routes[1];
		}

		// подцепляем файл с классом контроллера
		$controller_file = TAGTILE_DIR.str_replace('_', '/controller/', $controller_name).'.php';
		$controller_name = str_replace('_', 'controller', $controller_name);
					// echo "<pre>";
					// echo var_dump($action_name);
					// echo "</pre>";
		if(class_exists($controller_name)) return;
		if(!in_array($controller_name,$allow_controllers)) {
					echo "<pre>";
					echo 'Error: Could not controller: ' .$controller_name;
					echo "<input type=\"button\" onclick=\"history.back();\" value=\"BACK\"/>";
					echo "</pre>";
					exit();
		}
		if(!in_array($action_name,$allow_actions)) {
					echo "<pre>";
					echo 'Error: Could not action: ' .$action_name;
					echo "</pre>";
					exit();
		}
		$controller_path = $controller_file;
		if(file_exists($controller_path))
		{
			include $controller_file;
		}
		
		// создаем контроллер

		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
	
	}
	
}
?>