<?php

namespace App\Core;

/**
 * Класс View, отвечающий за подключение и отображения представлений и работу с шаблонами.
 */
class View
{
    /**
     * Рендеринг страницы.
     * 
     * @param string $contentView Название страницы
     * @param array $data Данные для страницы
     * 
     * @return mixed
     */
    public function render(string $contentView, array $data = [])
	{
        $view = $contentView . '.php';
        
        extract($data);

        include VIEWS . $view;
    }
}