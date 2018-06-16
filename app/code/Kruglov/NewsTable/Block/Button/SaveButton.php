<?php
/**
 * Button for redirect back
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */
namespace Kruglov\NewsTable\Block\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Kruglov\NewsTable\Block\Button
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Currency'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
//    /**
//     * @return array
//     */
//    public function getButtonData()
//    {
//        return [
//            'label' => __('Save'),
//            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
//            'class' => 'save primary',
//            'sort_order' => 90
//        ];
//    }
//
//    /**
//     * Get URL for back (reset) button
//     *
//     * @return string
//     */
//    public function getBackUrl()
//    {
//        return $this->getUrl('*/*/save');
//    }
}
