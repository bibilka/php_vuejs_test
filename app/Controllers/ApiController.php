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
        // $this->comments->delete();
        // $this->comments->create([
        //     'username' => 'Alex',
        //     'email' => 'test@mail.ru',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'title' => 'Комментарий #1',
        //     'comment' => 'С учётом сложившейся международной обстановки, консультация с широким активом требует от нас анализа своевременного выполнения сверхзадачи. Как принято считать, активно развивающиеся страны третьего мира представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть описаны максимально подробно. Задача организации, в особенности же реализация намеченных плановых заданий однозначно фиксирует необходимость прогресса профессионального сообщества.'
        // ]);

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
            successResponse([], 'Комментарий успешно добавлен!') :
            errorResponse();
    }
}