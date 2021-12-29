<?php

namespace Addonsys\ToDoList\Ui;

use Magento\Config\Model\Config\Backend\Admin\Custom;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Exception;

class TaskCustomerColumn extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        ContextInterface            $context,
        UiComponentFactory          $uiComponentFactory,
        array                       $components = [],
        array                       $data = [],
        CustomerRepositoryInterface $customerRepository
    )
    {
        $this->customerRepository = $customerRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')] = $this->prepareItem($item);
            }
        }
        return $dataSource;
    }

    /**
     * @param array $item
     * @return string
     * @throws NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function prepareItem(array $item): string
    {
        try {
            $customer = $this->customerRepository->getById((int)$item['customer_id']);
            return $customer->getFirstname() . ' ' . $customer->getLastname();
        }
        catch (NoSuchEntityException $exception) {
            return "N/A";
        }
        catch (LocalizedException $exception) {
            return "N/A";
        }
    }


}
