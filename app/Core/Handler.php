<?php

namespace App\Core;

/**
 * Класс-обработчик ошибок и исключений, вызываемых (генериуремых) во время работы приложения.
 * 
 * @todo: в этих обработчиках еще надо по-хорошему:
 * 1. проверять ENV_DEBUG и в зависимости от этого менять сообщение/формат сообщения
 * 2. определять статус (код) ошибки
 */
class Handler
{
    /**
     * Обработка ошибок.
     * 
     * @param mixed $errno
     * @param mixed $errstr текст ошибки
     * @param mixed $errfile
     * @param mixed $errline
     * 
     * @return string|false|mixed 
     */
    public static function error($errno, $errstr, $errfile, $errline) 
    {
        return self::requestWantsJson() ? errorResponse(500, $errstr) : Route::errorPage(500, $errstr);
    }

    /**
     * Обработка исключений.
     * 
     * @param \Throwable $ex Исключение
     * 
     * @return string|false|mixed 
     */
    public static function exception(\Throwable $ex)
    {
        $message = $ex->getMessage();
        return self::requestWantsJson() ? errorResponse(500, $message) : Route::errorPage(500, $message);
    }

    /**
     * @return bool Требует ли запрос ответа в формате json
     */
    public static function requestWantsJson()
    {
        return explode(',', getallheaders()['Accept'])[0] == 'application/json';
    }
}