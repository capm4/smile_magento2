<?php
/**
 * list actions for ui_component list
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Ui\Component\Listing\Column;


use Smile\Contact\Block\Adminhtml\Grid\Action\UrlBuilder;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Escaper;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class PageActions
 * @package Smile\Contact\Ui\Component\Listing\Column
 */
class PageActions extends Column
{
    /** Url path */
    const SMILE_URL_PATH_SEND = 'admin_smilecontact/table/form';
    const SMILE_URL_PATH_VIEW = 'admin_smilecontact/table/view';


    /**
     * @var UrlBuilder
     */
    protected $actionUrlBuilder;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    /**
     * @var Escaper
     */
    private $escaper;

    /**
     * PageActions constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlBuilder $actionUrlBuilder
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @param string $sendtUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlBuilder $actionUrlBuilder,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $sendtUrl = self::SMILE_URL_PATH_SEND
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->actionUrlBuilder = $actionUrlBuilder;
        $this->editUrl = $sendtUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {
                    $item[$name]['save'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['id' => $item['id']]),
                        'label' => __('Answer')
                    ];
                    $item[$name]['view'] = [
                        'href' => $this->urlBuilder->getUrl(self::SMILE_URL_PATH_VIEW, ['id' => $item['id']]),
                        'label' => __('View')
                    ];

                }
            }
        }

        return $dataSource;
    }

}
