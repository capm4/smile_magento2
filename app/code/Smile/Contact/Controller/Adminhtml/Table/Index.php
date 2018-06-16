<?php
/**
 * Controller for ui_component list
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Controller\Adminhtml\Table;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

/**
 * Class Index
 * @package Smile\Contact\Controller\Adminhtml\Table
 */
class Index extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Smile_Contact::general_config';

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
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        if ($this->_isAllowed()) {
            return $this->pageFactory->create();
        }

        return $this->_redirect('/');
    }
}