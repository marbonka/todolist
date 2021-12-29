<?php

namespace Addonsys\ToDoList\Controller\Adminhtml\Task;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action implements HttpGetActionInterface
{

    /**
     * @inheritDoc
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('To-Do-List Tasks'));
        return $resultPage;
    }
}
