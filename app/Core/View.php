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
     * @param string $template Название шаблона
     * @param array $data Данные для страницы
     * 
     * @return mixed
     */
    public function render(string $contentView, string $templateView, array $data = [])
	{
        $template = $contentView . '.php';
        $view_name = $contentView . '.php';
        
        extract($data);

        ob_start();
        include VIEWS . $view_name;
        $content = ob_get_clean();
        ob_end_clean();

        include VIEWS . 'templates/' . $template;
    }
}