<?php

namespace App\Core;

use PDO;

/**
 * Базовый класс для модели данных.
 */
abstract class Model
{
    /**
     * @var PDO $db Объект для работы с базой данных
     */
    protected PDO $db;

    /**
     * @var array $columns Список полей (атрибутов) у конкретной сущности. Реализуется в дочерних классах.
     */
    protected array $columns = [];
    
    /**
     * @var string $table Название таблицы в базе данных, которая представляет текущий объект.
     */
    protected string $table = '';

    /**
     * Инициализация подключения к базе данных.
     * @throws \PDOException
     */
    public function __construct()
    {
        $this->db = new PDO('mysql:dbname=database;host=db', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    /**
     * Создать новый объект (добавляет запись в базу данных).
     * 
     * @param array $attributes Массив данных, где ключ - наименование атрибута, значение - значение этого атрибута
     * 
     * @throws \PDOException
     * 
     * @return bool
     */
    public function create(array $attributes)
    {
        $columns = implode(', ', $this->columns);
        
        $valuesPlaceHolder = [];
        foreach ($this->columns as $column) {
            $valuesPlaceHolder[] = ":$column";
        }
        $valuesPlaceHolder = implode(', ', $valuesPlaceHolder);

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($valuesPlaceHolder);";

        return $this->db->prepare($sql)->execute($attributes);
    }

    /**
     * Получить все сущности данной модели из базы данных.
     * 
     * @throws \PDOException
     * 
     * @return array 
     */
    public function all()
    {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Удалить все сущности данной модели из базы данных.
     * @throws \PDOException
     * @return bool
     */
    public function delete()
    {
        return $this->db->query("DELETE FROM {$this->table} WHERE 1");
    }
}