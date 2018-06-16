<?php
/**
 * Controller for ui_component answer form
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Controller\Adminhtml\Table;

use Magento\Backend\App\Action;

/**
 * Class Form
 * @package Smile\Contact\Controller\Adminhtml\Table
 */
class Form extends Action
{   /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Smile_Contact::blog';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * Smile/Contact Repository
     *
     * @var \Smile\Contact\Model\SmileContactRepository
     */
    protected $resultPageFactory;



    /**
     * Send constructor.
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
    Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    \Magento\Framework\Registry $registry
) {
    $this->resultPageFactory = $resultPageFactory;
    $this->_coreRegistry = $registry;
    parent::__construct($context);
}

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Smile_Contact::blog')
            ->addBreadcrumb(__('Contact'), __('Contact'))
            ->addBreadcrumb(__('Contact Us'), __('Contact Us'));
        return $resultPage;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // Get ID and create model
        $id = $this->getRequest()->getParam('id');

        $model = $this->_objectManager->create(\Smile\Contact\Model\SmileContact::class);

        // Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This question no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('smile_contact', $model);

        // Build answer form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}