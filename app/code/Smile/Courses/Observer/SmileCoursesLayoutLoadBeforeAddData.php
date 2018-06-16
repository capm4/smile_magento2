<?php
namespace Smile\Courses\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class DataAssignObserver
 */
class SmileCoursesLayoutLoadBeforeAddData implements ObserverInterface
{
    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * SmileCoursesLayoutLoadBeforeAddData constructor
     *
     * @param \Magento\Framework\App\Request\Http $request
     */
    public function __construct(
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->request = $request;
    }

    /**
     * @param Observer $observer
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute(Observer $observer)
    {
        if ($this->request->getRouteName() === 'courses') {
            /** @var \Magento\Framework\View\Layout $layout */
            $layout = $observer->getLayout();
            $layout->getUpdate()->addHandle('course_additional');
        }
    }
}
