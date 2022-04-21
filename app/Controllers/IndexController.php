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
        $this->view->render('main', 'base');
    }
}