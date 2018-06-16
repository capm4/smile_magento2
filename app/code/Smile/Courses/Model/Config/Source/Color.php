<?php
namespace Smile\Courses\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Color implements ArrayInterface
{
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => 'lime',
                'label' => __('Lime')
            ],
            [
                'value' => '#dddddd',
                'label' => __('Gray')
            ]
        ];
    }
}