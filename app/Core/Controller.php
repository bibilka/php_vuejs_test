<?php

namespace App\Core;

/**
 * Базовый класс контроллера.
 */
abstract class Controller {
	
	/**
	 * @var View $view Объект для работы с представлениями
	 */
	protected View $view;
	
	/**
	 * Инициализация контроллера.
	 */
	public function __construct()
	{
		$this->view = new View();
	}
}