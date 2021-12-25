<?php

namespace Addonsys\ToDoList\Model\ResourceModel\Task;

use Addonsys\ToDoList\Api\Data\TaskInterface;
use Addonsys\ToDoList\Api\Data\TaskSearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Addonsys\ToDoList\Model\Task;
use Addonsys\ToDoList\Model\ResourceModel\Task as TaskResource;

class Collection extends AbstractCollection implements TaskSearchResultInterface
{
    protected function _construct()
    {
        $this->_init(Task::class,TaskResource::class);
    }

    public function getSearchCriteria()
    {
        // TODO: Implement getSearchCriteria() method.
    }

    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement setSearchCriteria() method.
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
        return $this;
    }

    public function setItems(array $items)
    {
        if(!$items){
            return $this;
        }
        foreach($items as $item){
            $this->addItem($item);
        }
        return $this;
    }
}
