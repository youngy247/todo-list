<?php

namespace App\Models;

use App\Entities\Task;
use PDO;

class TasksModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTasks(): array
    {
//        return [
//            new Book ('Refactoring',  'Martin Fowler'),
//            new Book ('Test-Driven Development',  'Kent Beck')
//        ];
        $sql = 'SELECT `id`, `name`, `status`
            FROM `tasks`;';
        $query = $this->db->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute();
        return $query->fetchAll();
    }

//    public function getBook(string $id){
//        $sql = 'SELECT `id`,
//            `title`,
//            `author`
//            FROM `books`
//            WHERE `id` = :id;';
//        $query = $this->db->prepare($sql);
//        $query->setFetchMode(PDO::FETCH_CLASS, Book::class);
//        $params = ['id' => $id];
//        $query->execute($params);
//        return $query->fetch();
//    }
//

    public function addTask($newTask)
    {
        $sql = 'INSERT INTO `tasks` (`name`, `status`)
            VALUES (:name, :status);';
        $query = $this->db->prepare($sql);
        $params = [
            'name' => $newTask['name'],
            'status' => $newTask['status']
        ];
        $query->execute($params);
        return $this->db->lastInsertId();
    }

    public function getTaskCount(): int
    {
        $sql = 'SELECT COUNT(*) as count FROM `tasks`';
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    public function updateTaskStatus($taskId, $status)
    {
        $sql = 'UPDATE `tasks`
            SET `status` = :status
            WHERE `id` = :task_id;';
        $query = $this->db->prepare($sql);
        $params = [
            'status' => $status,
            'task_id' => $taskId
        ];
        $query->execute($params);
    }

    public function deleteTask($taskId)
    {
        $sql = 'DELETE FROM `tasks` WHERE `id` = :task_id;';
        $query = $this->db->prepare($sql);
        $query->execute(['task_id' => $taskId]);
    }

    public function updateTaskName($taskId, $name)
    {
        $sql = 'UPDATE `tasks`
            SET `name` = :name
            WHERE `id` = :task_id;';
        $query = $this->db->prepare($sql);
        $params = [
            'name' => $name,
            'task_id' => $taskId
        ];
        $query->execute($params);
    }
}