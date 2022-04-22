<?php

if (!function_exists('dd')) {

    /**
     * Фукнция дебага: выводит переданные данные в форматированном формате и завершает работу приложения.
     */
    function dd()
    {
        foreach (func_get_args() as $x) {
            print_r($x);
        }
        die;
    }
}

if (!function_exists('successResponse')) {

    /**
     * Функция для успешного http-ответа в формате json.
     * 
     * @param array $data Данные
     * @param string $msg Сообщение
     * 
     * @return string|false
     */
    function successResponse(array $data, string $msg = 'OK')
    {
        http_response_code(200);

        header('Content-Type: application/json');

        echo json_encode([
            'status' => true,
            'code' => 200,
            'message' => $msg,
            'data' => $data,
        ]);
        exit;
    }
}

if (!function_exists('errorResponse')) {

    /**
     * Функция для http-ответа об ошибке в формате json.
     * 
     * @param array $data Данные
     * @param string $msg Сообщение
     * 
     * @return string|false
     */
    function errorResponse(int $statusCode = 500, string $msg = 'Произошла непредвиденная ошибка')
    {
        http_response_code($statusCode);

        header('Content-Type: application/json');
        
        echo json_encode([
            'status' => false,
            'code' => $statusCode,
            'message' => $msg
        ]);
        exit;
    }
}