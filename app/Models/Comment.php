<?php

namespace App\Models;

use App\Core\Model;

/**
 * Класс-модель для взаимодействия с сущностью "Комментарий к статье".
 * 
 * @method bool create($attributes) Добавить новый комментарий
 * @method array all() Получить все существующие комментарии
 * @method bool delete() Удалить все существующие комментарии
 */
class Comment extends Model
{
    /**
     * @var array $columns Атрибуты модели
     */
    protected array $columns = ['username', 'email', 'created_at', 'title', 'comment'];
    
    /**
     * @var string $table Название таблицы в базе данных
     */
    protected string $table = 'comments';

    /**
     * Валидация значений, перед сохранением комментария.
     * @param array $attributes Данные.
     * @return bool
     */
    public function validate(array $attributes = []) : bool
    {
        // валидация текстовых значений на размер
        foreach (['username', 'email', 'title'] as $field) {
            if (!isset($attributes[$field]) || strlen($attributes[$field]) <= 2 || strlen($attributes[$field]) > 100) {
                return false;
            }
        }
        
        // текст комментария
        if (!isset($attributes['comment']) || strlen(trim($attributes['comment'])) <= 4 || strlen(trim($attributes['comment'])) > 500) {
            return false;
        }

        // валидация email
        if (!filter_var($attributes['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
}