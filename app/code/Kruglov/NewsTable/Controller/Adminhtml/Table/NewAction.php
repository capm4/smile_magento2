<?php
/**
 *
 *
 * @catalog   ${CATALOG}
 * @package   ${PACKAGE}
 * @copyrigth 20.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\NewsTable\Controller\Adminhtml\Table;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class NewAction extends Action
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