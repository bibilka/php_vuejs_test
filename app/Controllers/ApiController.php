<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Comment as CommentModel;

/**
 * Контроллер для работы внутреннего API приложения.
 */
class ApiController extends Controller
{
    /**
     * @var CommentModel $comments Модель для работы с комментариями
     */
    protected CommentModel $comments;

    /**
     * Инициализация контроллера.
     */
    public function __construct()
    {
        $this->comments = new CommentModel;
    }

    /**
     * Получение списка комментариев к статье.
     * 
     * @return string|false Ответ в формате json
     */
    public function getComments()
    {
        return successResponse($this->comments->all());
    }

    /**
     * Добавление нового комментария.
     * 
     * @return string|false Ответ в формате json
     */
    public function addComment()
    {
        // получаем данные из ajax-запроса (request payload)
        $request = file_get_contents('php://input');
        $comment = json_decode($request, true);

        // устанвливаем дату комментария
        $comment['created_at'] = date('Y-m-d H:i:s');
        
        // создаем комментарий и возвращаем ответ
        return $this->comments->create($comment) ? 
            successResponse($comment, 'Комментарий успешно добавлен!') :
            errorResponse();
    }
}