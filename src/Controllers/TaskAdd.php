<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;
use Slim\Views\PhpRenderer;

class TaskAdd
{
    private TasksModel $tasksModel;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $tasksModel, PhpRenderer $renderer)
    {
        $this->tasksModel = $tasksModel;
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request,
                             ResponseInterface $response,
                             array $args): ResponseInterface
    {
        $newTask = $request->getParsedBody();

        $forResponse = '<p>Task ';

        // use model to add data to database
        $newId = $this->tasksModel->addTask($newTask);
        if ($newId) {
            $forResponse .= $newId . ' saved successfully</p><a href="/tasks">Back to tasks</a>';
        } else {
            $forResponse .= 'not saved<a href="/tasks">Back to tasks</a>';
        }

        $forResponse .= '</p>';

        $response->getBody()->write($forResponse);
        return $response;
    }
}