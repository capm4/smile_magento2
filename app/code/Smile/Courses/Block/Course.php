<?php
namespace Smile\Courses\Block;

use Magento\Framework\View\Element\Template;

class Course extends Template
{
    public function getH1()
    {
        return __('Hello M2');
    }

    public function getM2()
    {
        return __('Hello M2');
    }

    public function getBackground()
    {
        return $this->_scopeConfig->getValue('web/smile_courses/background_color');
    }
}
