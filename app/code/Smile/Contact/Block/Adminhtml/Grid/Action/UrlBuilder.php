<?php
/**
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */
namespace Smile\Contact\Block\Adminhtml\Grid\Action;

use Magento\Store\Api\StoreResolverInterface;

/**
 * Class UrlBuilder
 * @package Smile\Contact\Block\Adminhtml\Grid\Action
 */
class UrlBuilder
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $frontendUrlBuilder;

    /**
     * @param \Magento\Framework\UrlInterface $frontendUrlBuilder
     */
    public function __construct(\Magento\Framework\UrlInterface $frontendUrlBuilder)
    {
        $this->frontendUrlBuilder = $frontendUrlBuilder;
    }

    /**
     * Get action url
     *
     * @param string $routePath
     * @param string $scope
     * @param string $store
     * @return string
     */
    public function getUrl($routePath, $scope, $store)
{
    $this->frontendUrlBuilder->setScope($scope);
    $href = $this->frontendUrlBuilder->getUrl(
        $routePath,
        [
            '_current' => false,
            '_nosid' => true,
            '_query' => [StoreResolverInterface::PARAM_NAME => $store]
        ]
    );

    return $href;
}
}