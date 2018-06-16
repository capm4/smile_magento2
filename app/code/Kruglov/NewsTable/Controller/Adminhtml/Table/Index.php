<?php
/**
 * Controller for Main Table index page
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */

namespace Kruglov\NewsTable\Controller\Adminhtml\Table;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

/**
 * Class Index
 * @package Kruglov\NewsTable\Controller\Adminhtml\Table
 */

class Index extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Kruglov_NewsTable::general_config';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        if ($this->_isAllowed()) {
            return $this->pageFactory->create();
        }

        return $this->_redirect('/');
    }
}