<?php

namespace Addonsys\ToDoList\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Index extends Action
{
    /**
     * @var Session
     */
    private $session;

    public function __construct(
        Context $context,
        Session $session
    )
    {
        $this->session = $session;
        parent::__construct($context);
    }

    public function execute()
    {
        if(!$this->session->isLoggedIn()){
            /**
             * @var Redirect $redirect
             */
            $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $redirect->setPath('customer/account/login');
            return $redirect;
        }
       return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
