<?php

namespace Addonsys\ToDoList\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */

interface TaskSearchResultInterface extends SearchResultsInterface {
    /**
     * @return TaskInterface[]
     */
    public function getItems();

    /**
     * @param TaskInterface[] $items
     * @return TaskSearchResultInterface
     */
    public function setItems(array $items);
}
