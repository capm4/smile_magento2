<?php
/**
 * Controller for currency dollar page
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */

namespace Kruglov\NewsTable\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class USDDescription
 * @package Kruglov\NewsTable\Controller\Index
 */
class USDDescription extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;


    /**
     * USDDescription constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);

    }


    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}