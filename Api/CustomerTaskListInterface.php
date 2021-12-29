<?php

namespace Addonsys\ToDoList\Api;

use Addonsys\ToDoList\Api\Data\TaskInterface;

/**
 * @api
 */
interface CustomerTaskListInterface{

    /**
     * @param int $customerId
     * @return TaskInterface[]
     */
    public function getList(int $customerId);
}
