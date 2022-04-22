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
}