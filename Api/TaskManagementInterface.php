<?php
declare(strict_types=1);

namespace  Addonsys\ToDoList\Api;

/*
 * @api
 */

use Addonsys\ToDoList\Api\Data\TaskInterface;

interface TaskManagementInterface{

    /**
     * @param int $customerId
     * @param TaskInterface $task
     * @return int
     */
    public function save(int $customerId, TaskInterface $task): int;

    /**
     * @param TaskInterface $task
     * @return bool
     */
    public function delete(TaskInterface $task): bool;
}
