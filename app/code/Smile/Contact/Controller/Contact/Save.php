<?php
/**
 * Controller for save model from frontend contact us from
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */
namespace Smile\Contact\Controller\contact;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Smile\Contact\Helper\SaveQuestionHelper;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;

/**
 * Class Save
 * @package Smile\Contact\Controller\contact
 */
class Save extends Action
{

    /**
     * @var SaveQuestionHelper
     */
    protected $saveQuestion;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var LoggerInterface
     */
    private $logger;



    /**
     * Save constructor.
     * @param Context $context
     * @param SaveQuestionHelper $saveQuestion
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        SaveQuestionHelper $saveQuestion,
        DataPersistorInterface $dataPersistor,
        LoggerInterface $logger = null
    ) {
        $this->saveQuestion  = $saveQuestion;
        $this->dataPersistor = $dataPersistor;
        $this->logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try{
            /**
             *Validate get Params
             *Save to bd
             */
            $this->saveQuestion->validateAndSave($this->getRequest());
            $this->messageManager->addSuccessMessage(__('Question is Submit'));
        } catch (\Exception $e) {
            $this->dataPersistor->set('smile_contact_us', $this->getRequest()->getParams());
            $this->logger->critical($e);
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $this->resultRedirectFactory->create()->setPath('smilecontact/contact/form');
    }


}