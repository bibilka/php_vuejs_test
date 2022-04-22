<?php

namespace App\Exceptions;

/**
 * Исключение, вызываемое при ошибках во время валидации.
 */
class ValidationException extends \Exception
{
    /**
     * @var int $code HTTP код ответа
     */
    public $code = 422;

    /**
     * @var string $message Сообщение об ошибке
     */
    public $message = 'При отправке формы произошли ошибки.';
}