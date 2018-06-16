<?php
/**
 * Helper for frontend ui_component form
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Helper;

use Smile\Contact\Model\SmileContactRepository;
use Smile\Contact\Model\SmileContactFactory;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

/**
 * Class SaveQuestionHelper
 * @package Smile\Contact\Helper
 */
class SaveQuestionHelper extends \Magento\Framework\App\Helper\AbstractHelper
{


    /**
     * @var \Smile\Contact\Model\SmileContact
     */
    private $smileContactFactory;

    /**
     * @var SmileContactRepository
     */
    private $smileContactRepository;


    /**
     * SaveQuestionHelper constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param SmileContactFactory|null $smileContactFactory
     * @param SmileContactRepository $smileContactRepository
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        SmileContactFactory $smileContactFactory = null,
        SmileContactRepository $smileContactRepository
    ) {
        $this->smileContactFactory= $smileContactFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(SmileContactFactory::class);
        $this->smileContactRepository = $smileContactRepository;
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
        if (trim($request->getParam('name')) === '') {
            throw new LocalizedException(__('Name is missing'));
        }
        if (trim($request->getParam('title')) === '') {
            throw new LocalizedException(__('Title is missing'));
        }
        if (trim($request->getParam('email')) === '') {
            throw new LocalizedException(__('Email is missing'));
        }
        if (false === \strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('Invalid email address'));
        }
        if (trim($request->getParam('question')) === '') {
            throw new LocalizedException(__('Question is missing'));
        }
        /**
         * after validate save
         */
        $this->save($request);

        return $request->getParams();
    }

    /**
     * Save Question to db
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     * @throws LocalizedException
     */
    public function save(\Magento\Framework\App\RequestInterface $request){
        $data = $request->getPostValue();
        if ($data) {
            if (empty($data['id'])) {
                $data['id'] = null;
            }

            $model = $this->smileContactFactory->create();
            $model->setData($data);
            try {
                $this->smileContactRepository->save($model);
            } catch (LocalizedException $e) {
                throw new LocalizedException($e->getMessage());
            } catch (\Exception $e) {
                throw new Exception($e->getMessage());
            }
            return $model;
        }
        return false;
    }


}