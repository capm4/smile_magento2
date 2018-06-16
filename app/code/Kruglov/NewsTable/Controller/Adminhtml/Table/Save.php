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

use Kruglov\NewsTable\Model\KruglovNewsTableRepository;
use Kruglov\NewsTable\Api\KruglovNewsTableRepositoryInterfaceFactory;
use Kruglov\NewsTable\Model\KruglovNewsTable;
use Kruglov\NewsTable\Model\KruglovNewsTableFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

/**
 * Class Save
 * @package Kruglov\NewsTable\Controller\Adminhtml\Table
 */
class Save extends Action
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var KruglovNewsTable
     */
    private $kruglovNewsTableFactory;

    /**
     * @var KruglovNewsTableRepositoryInterface
     */
    private $kruglovNewsTableRepository;

    /**
     * Save constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param KruglovNewsTableFactory|null $kruglovNewsTableFactory
     * @param KruglovNewsTableRepository $kruglovNewsTableRepository
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        KruglovNewsTableFactory $kruglovNewsTableFactory = null,
        KruglovNewsTableRepository $kruglovNewsTableRepository
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->kruglovNewsTableFactory= $kruglovNewsTableFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(KruglovNewsTableFactory::class);
        $this->kruglovNewsTableRepository = $kruglovNewsTableRepository;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            if (empty($data['id'])) {
                $data['id'] = null;
            }

            $model = $this->kruglovNewsTableFactory->create();
            $model->setData($data);

            try {
                $this->kruglovNewsTableRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the Currency.'));
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the currency.'));
            }

            $this->dataPersistor->set('kruglov_newsTable', $data);
            return $resultRedirect->setPath('*/*/index');
        }
        return $resultRedirect->setPath('*/*/new');
    }

}
