<?php

declare(strict_types=1);

namespace Addonsys\ToDoList\Service;

use Addonsys\ToDoList\Api\Data\TaskInterface;
use Addonsys\ToDoList\Api\TaskManagementInterface;
use Addonsys\ToDoList\Model\ResourceModel\Task as TaskResource;
use Magento\Framework\Exception\AlreadyExistsException;

class TaskManagement implements TaskManagementInterface
{
    /**
     * @var TaskResource
     */
    private $resource;

    public function __construct(
        TaskResource $resource
    )
    {
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function save(int $customerId,TaskInterface $task): int
    {
        $task->setData('customer_id',$customerId);
        $this->resource->save($task);
        return $task->getTaskId();
    }

    /**
     * @param TaskInterface $task
     * @return bool
     * @throws \Exception
     */
    public function delete(TaskInterface $task): bool
    {
        $this->resource->delete($task);
        return true;
    }
}
