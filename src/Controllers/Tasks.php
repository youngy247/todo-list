<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;


class Tasks
{
    private PhpRenderer $renderer;

    private TasksModel $tasksModel;

    public function __construct(PhpRenderer $phpRenderer, TasksModel $tasksModel)
    {
        $this->renderer = $phpRenderer;
        $this->tasksModel = $tasksModel;
    }
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $this->tasksModel->getTasks();
        $template = 'tasks.php';

        if (strpos($request->getUri()->getPath(), '/completedtasks') !== false) {
            $template = 'completedtasks.php';
        }

        return $this->renderer->render($response, $template, ['tasks' => $data]);
    }


    public function updateStatus(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $taskId = $request->getParam('task_id');
        $status = $request->getParam('status');

        $this->tasksModel->updateTaskStatus($taskId, $status);

        return $response->withRedirect('/tasks');
    }
    public function deleteTask(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $taskId = $request->getParam('task_id');

        $this->tasksModel->deleteTask($taskId);

        $currentUrl = $request->getUri()->getPath();

        if($currentUrl === '/completedtasks/delete'){
            return $response->withRedirect('/completedtasks');
        }
        return $response->withRedirect('/tasks');

    }

    public function editTask(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $taskId = $request->getParam('task_id');
        $newName = $request->getParam('new_name_' . $taskId);

        $this->tasksModel->updateTaskName($taskId, $newName);

        return $response->withRedirect('/tasks');
    }

}