<?php
declare(strict_types=1);

namespace Addonsys\ToDoList\Api;

/**
 * @api
 */
interface TaskStatusManagementInterface{
    /**
     * @param int $taskId
     * @param string $status
     * @return bool
     */
    public function change(int $taskId, string $status): bool;
}
