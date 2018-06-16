<?php
/**
 * Controller for validate and save Answer from ui_component form
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Controller\Adminhtml\Table;

use Exception;
use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Smile\Contact\Model\SmileContactRepository;
use Magento\Framework\App\Request\DataPersistorInterface;
use Smile\Contact\Helper\Adminhtml\SaveAnswerHelper;

/**
 * Class Save
 * @package Smile\Contact\Controller\Adminhtml\Table
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Smile_Contact::general_config';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $pageFactory;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var SmileContactRepository
     */
    protected $smileContactRepository;

    /**
     * @var SaveAnswerHelper
     */
    protected  $saveAnswerHelper;


    /**
     * Save constructor.
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param SmileContactRepository $smileContactRepository
     * @param SaveAnswerHelper $saveAnswerHelper
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        SmileContactRepository $smileContactRepository,
        SaveAnswerHelper $saveAnswerHelper
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->smileContactRepository = $smileContactRepository;
        $this->pageFactory = $pageFactory;
        $this->saveAnswerHelper = $saveAnswerHelper;
        parent::__construct($context);

    }


    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        try{
            $this->saveAnswerHelper->validateAndSave($this->getRequest());
            $this->messageManager->addSuccessMessage(__('You send the Answer.'));
            return $this->_redirect('*/*/index');

        }catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the answer.'));
        }
        return$this->_redirectsetPath('*/*/form');
    }
}