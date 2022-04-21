<?php

namespace App\Controllers;

use App\Core\Controller;

/**
 * Основной контроллер приложения.
 */
class IndexController extends Controller
{
    /**
     * Основная страница приложения.
     */
    public function index()
    {
        // рендерим страницу со статьей
        $this->view->render('article');
    }
}