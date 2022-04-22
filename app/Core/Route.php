<?php

namespace App\Core;

/**
 * Класс Route, отвечающий за роутинг (маршрутизацию приложения).
 */
class Route
{
	/**
	 * Запуск приложения: парсинг маршрута, определение контроллера и метода.
	 * @return mixed
	 */
	public static function start()
	{
		// контроллер и действие по умолчанию
		$controllerName = 'Index';
		$actionName = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if (!empty($routes[1])) {	
			$controllerName = ucfirst($routes[1]);
		}
		
		// получаем имя экшена
		if (!empty($routes[2]) ) {
			$actionName = $routes[2];
		}

		// пытаемся подключить класс контроллера
		$controllerName = '\\App\Controllers\\' . $controllerName . 'Controller';
		if (!class_exists($controllerName)) {
			// если такой не существует - выводим 404 страницу
			return Route::errorPage(404);
		}
		
		// создаем контроллер
		$controller = new $controllerName;
		$action = $actionName;

		// проверяем существование метода
		if (!method_exists($controller, $action)) {
			return Route::errorPage(404);
		}
		
		// вызываем действие контроллера
		return $controller->$action();
	}
	
	/**
	 * Рендеринг страницы ошибки.
	 * @return mixed
	 */
	public static function errorPage(int $statusCode = 404, string $message = '404 Not Found')
	{
        http_response_code($statusCode);
		(new View)->render('error', compact('message'));
    }
}