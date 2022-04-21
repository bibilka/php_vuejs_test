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