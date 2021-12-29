<?php

declare(strict_types=1);

namespace Addonsys\ToDoList\Service;

use Addonsys\ToDoList\Api\Data\TaskInterface;
use Addonsys\ToDoList\Api\TaskRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;

class CustomerTaskList implements \Addonsys\ToDoList\Api\CustomerTaskListInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var FilterBuilder
     */
    private $filterBuilder;

    /**
     * @var Session
     */
    private Session $session;


    /**
     * @param TaskRepositoryInterface $taskRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     */
    public function __construct(
        TaskRepositoryInterface $taskRepository,
        SearchCriteriaBuilder   $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        Session $session
    )
    {
        $this->taskRepository = $taskRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
    }

    /**
     * @inheritDoc
     */
    public function getList(int $customerId): array
    {
        $this->searchCriteriaBuilder->addFilter(
            $this->filterBuilder->create()
                ->setField('customer_id')
                ->setValue($customerId)
        );
        $searchCriteria = $this->searchCriteriaBuilder->create();
        return $this->taskRepository
            ->getList($this->searchCriteriaBuilder->create())
            ->getItems();
    }
}
