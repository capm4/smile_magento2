<?php
/**
 *
 *
 * @catalog   ${CATALOG}
 * @package   ${PACKAGE}
 * @copyrigth 28.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Controller\Adminhtml\Table;

use Magento\Backend\App\Action\Context;
use Smile\Contact\Api\SmileContactRepositoryInterface as SmileContactRepository;
use Magento\Framework\Controller\Result\JsonFactory;
use Smile\Contact\Api\Data\SmileContactInterface;

class InlineEdit extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Smile_Contact::general_config';

    /**
     * @var \Smile\Contact\Controller\Adminhtml\Table\PostDataProcessor
     */
    protected $dataProcessor;

    /**
     * @var \Smile\Contact\Api\SmileContactRepositoryInterface
     */
    protected $smileContactRepository;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * @param Context $context
     * @param PostDataProcessor $dataProcessor
     * @param SmileContactRepository $smileContactRepository
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        PostDataProcessor $dataProcessor,
        SmileContactRepository $smileContactRepository,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->dataProcessor = $dataProcessor;
        $this->smileContactRepository = $smileContactRepository;
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $id) {
            $page = $this->smileContactRepository->getById($id);
            try {
                $pageData = $this->filterPost($postItems[$id]);
                $this->validatePost($pageData, $page, $error, $messages);
                $extendedPageData = $page->getData();
                $this->setCmsPageData($page, $extendedPageData, $pageData);
                $this->smileContactRepository->save($page);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $messages[] = $this->getErrorWithPageId($page, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithPageId($page, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithPageId(
                    $page,
                    __('Something went wrong while saving the page.')
                );
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * Filtering posted data.
     *
     * @param array $postData
     * @return array
     */
    protected function filterPost($postData = [])
    {
        $pageData = $this->dataProcessor->filter($postData);
        $pageData['custom_theme'] = isset($pageData['custom_theme']) ? $pageData['custom_theme'] : null;
        $pageData['custom_root_template'] = isset($pageData['custom_root_template'])
            ? $pageData['custom_root_template']
            : null;
        return $pageData;
    }

    /**
     * @param array $pageData
     * @param \Smile\Contact\Model\SmileContact $smileContact
     * @param $error
     * @param array $messages
     */
    protected function validatePost(array $pageData, \Smile\Contact\Model\SmileContact $smileContact, &$error, array &$messages)
    {
        if (!($this->dataProcessor->validate($pageData) && $this->dataProcessor->validateRequireEntry($pageData))) {
            $error = true;
            foreach ($this->messageManager->getMessages(true)->getItems() as $error) {
                $messages[] = $this->getErrorWithPageId($smileContact, $error->getText());
            }
        }
    }

    /**
     * @param SmileContactInterface $smileContact
     * @param $errorText
     * @return string
     */
    protected function getErrorWithPageId(SmileContactInterface $smileContact, $errorText)
    {
        return '[Contact ID: ' . $smileContact->getId() . '] ' . $errorText;
    }

    /**
     * @param SmileContactInterface $smileContact
     * @param array $extendedPageData
     * @param array $pageData
     * @return $this
     */
    public function setCmsPageData(SmileContactInterface $smileContact, array $extendedPageData, array $pageData)
    {
        $smileContact->setData(array_merge($smileContact->getData(), $extendedPageData, $pageData));
        return $this;
    }
}