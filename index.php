<?php

/**
 * Основная точка входа в приложение.
 */

// устанавливаем таймзону
date_default_timezone_set('Europe/Moscow');

// настройка вывода ошибок
ini_set('display_errors', 1);

// подключение конфига и автозагрузки классов 
include 'config.php';
include 'vendor/autoload.php';

// делегируем обработку ошибок в специальный класс-обработчик
set_error_handler('\\App\\Core\\Handler::error');
set_exception_handler('\\App\\Core\\Handler::exception');

// запуск приложения
require_once 'app/bootstrap.php';