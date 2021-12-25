<?php

namespace Addonsys\ToDoList\Controller\Index;

use Addonsys\ToDoList\Api\TaskManagementInterface;
use Addonsys\ToDoList\Service\TaskRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Addonsys\ToDoList\Model\Task;
use Addonsys\ToDoList\Model\ResourceModel\Task as TaskResource;
use Addonsys\ToDoList\Model\TaskFactory;

class Index extends Action
{

    /**
     * @var TaskResource
     */
    private $taskResource;

    /**
     * @var TaskFactory
     */
    private $taskFactory;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var TaskManagementInterface
     */
    private $taskManagement;

    /**
     * @param Context $context
     * @param TaskFactory $taskFactory
     * @param TaskResource $taskResource
     * @param TaskRepository $taskRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param TaskManagementInterface $taskManagement
     */

    public function __construct(
        Context               $context,
        TaskFactory           $taskFactory,
        TaskResource          $taskResource,
        TaskRepository        $taskRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        TaskManagementInterface $taskManagement
    )
    {
        $this->taskFactory = $taskFactory;
        $this->taskResource = $taskResource;
        $this->taskRepository = $taskRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->taskManagement = $taskManagement;
        parent::__construct($context);
    }

    public function execute()
    {
       return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
