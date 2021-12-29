<?php

declare(strict_types=1);

namespace Addonsys\ToDoList\Service;

use Addonsys\ToDoList\Api\TaskManagementInterface;
use Addonsys\ToDoList\Api\TaskRepositoryInterface;
use Addonsys\ToDoList\Model\Task;

class TaskStatusManagement implements \Addonsys\ToDoList\Api\TaskStatusManagementInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $repository;

    /**
     * @var TaskManagementInterface
     */
    private $management;


    /**
     * @param TaskRepositoryInterface $repository
     * @param TaskManagementInterface $management
     */
    public function __construct(
        TaskRepositoryInterface $repository,
        TaskManagementInterface $management
    )
    {
        $this->repository = $repository;
        $this->management = $management;
    }

    /**
     * @inheritDoc
     */
    public function change(int $customerId, int $taskId, string $status): bool
    {
        if(!in_array($status,['open','complete'])){
            return false;
        }
        $task = $this->repository->get($taskId);
        $task->setData(Task::STATUS,$status);
        $this->management->save($customerId, $task);
        return true;
    }
}
