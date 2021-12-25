<?php

namespace Addonsys\ToDoList\Model\ResourceModel;

use Addonsys\ToDoList\Api\Data\TaskInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Task extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init("addonsys_todolist_task", "task_id");
    }

}
