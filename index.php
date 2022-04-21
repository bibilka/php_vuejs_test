<?php

/**
 * Основная точка входа в приложение.
 */

// настройка вывода ошибок
ini_set('display_errors', 1);

// подключение конфига и автозагрузки классов 
include 'config.php';
include 'vendor/autoload.php';

// запуск приложения
require_once 'app/bootstrap.php';