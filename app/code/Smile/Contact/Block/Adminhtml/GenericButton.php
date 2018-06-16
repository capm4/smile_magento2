<?php
/**
 *
 * @catolog Smile
 * @package Smile\Contact
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */
namespace Smile\Contact\Block\Adminhtml;

use Magento\Backend\Block\Widget\Context;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var BlockRepositoryInterface
     */
    protected $blockRepository;

    /**
     * @param Context $context
     * @param BlockRepositoryInterface $blockRepository
     */
    public function __construct(
        Context $context,
        BlockRepositoryInterface $blockRepository
    ) {
        $this->context = $context;
        $this->blockRepository = $blockRepository;
    }

    /**
     * @return int|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getBlockId()
    {
        try {
            return $this->blockRepository->getById(
                $this->context->getRequest()->getParam('id')
            )->getId();
        } catch (LocalizedException $e) {
            throw new LocalizedException($e->getMessage());
        }

        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
