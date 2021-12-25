<?php

namespace Addonsys\ToDoList\Api;

use Addonsys\ToDoList\Api\Data\TaskInterface;

/**
 * @api
 */
interface CustomerTaskListInterface{

    /**
     * @return TaskInterface[]
     */
    public function getList();
}
