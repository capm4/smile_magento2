<?php
/**
 * Helper for admin ui_component form
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Helper\Adminhtml;

use Smile\Contact\Model\SmileContactRepository;
use Smile\Contact\Model\SmileContactFactory;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Customer\Helper\View as CustomerViewHelper;

/**
 * Class SaveAnswerHelper
 * @package Smile\Contact\Helper\Adminhtml
 */
class SaveAnswerHelper extends \Magento\Framework\App\Helper\AbstractHelper
{


    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * Customer session
     *
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;

    /**
     * @var \Magento\Customer\Helper\View
     */
    protected $_customerViewHelper;

    /**
     * @var \Smile\Contact\Model\SmileContact
     */
    private $smileContactFactory;

    /**
     * @var SmileContactRepository
     */
    private $smileContactRepository;

    /**
     * SaveAnswerHelper constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param SmileContactFactory|null $smileContactFactory
     * @param SmileContactRepository $smileContactRepository
     * @param \Magento\Customer\Model\Session $customerSession
     * @param CustomerViewHelper $customerViewHelper
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        SmileContactFactory $smileContactFactory = null,
        SmileContactRepository $smileContactRepository,
        \Magento\Customer\Model\Session $customerSession,
        CustomerViewHelper $customerViewHelper
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->smileContactFactory= $smileContactFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(SmileContactFactory::class);
        $this->smileContactRepository = $smileContactRepository;
        $this->_customerSession = $customerSession;
        $this->_customerViewHelper = $customerViewHelper;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Validate and save Question
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return array
     * @throws LocalizedException
     */

    public function validateAndSave(\Magento\Framework\App\RequestInterface $request){
        if (trim($request->getParam('answer')) === '') {
            throw new LocalizedException(__('Answer is missing'));
        }
        //  Get ID
        $id = $request->getParam('id');
        //  Get Answer
        $answer = $request->getParam('answer');
        $model = $this->smileContactFactory->create();
        //  Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                throw new LocalizedException(__('This question no longer exists.'));
            }
        }
        // save to db
        try {
            $model->setIsActive(0);
            $model->setAnswer($answer);
            $this->smileContactRepository->save($model);
        } catch (LocalizedException $e) {
            throw new LocalizedException($e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e, __('Something went wrong while saving the answer.'));
        }

        return $request->getParams();
    }


}