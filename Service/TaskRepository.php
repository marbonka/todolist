<?php

namespace Addonsys\ToDoList\Service;

use Addonsys\ToDoList\Api\Data\TaskInterface;
use Addonsys\ToDoList\Api\Data\TaskSearchResultInterface;
use Addonsys\ToDoList\Api\Data\TaskSearchResultInterfaceFactory;
use Addonsys\ToDoList\Api\TaskRepositoryInterface;
use Addonsys\ToDoList\Model\ResourceModel\Task;
use Addonsys\ToDoList\Model\TaskFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

class TaskRepository implements TaskRepositoryInterface
{
    /*
     * @var Task
     */
    private $resource;

    /**
     * @var TaskFactory
     */

    private $taskFactory;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param Task $resource
     * @param TaskFactory $taskFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param TaskSearchResultInterfaceFactory $searchResultFactory
     */
    public function __construct(
        Task        $resource,
        TaskFactory $taskFactory,
        CollectionProcessorInterface $collectionProcessor,
        TaskSearchResultInterfaceFactory $searchResultFactory
    )
    {
        $this->resource = $resource;
        $this->taskFactory = $taskFactory;
        $this->searchResultsFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return TaskSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): TaskSearchResultInterface
    {
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $this->collectionProcessor->process($searchCriteria, $searchResult);
        return $searchResult;
    }

    /**
     * @param int $taskId
     * @return TaskInterface
     */
    public function get(int $taskId):TaskInterface
    {
        $object = $this->taskFactory->create();
        $this->resource->load($object,$taskId);
        return $object;
    }
}
