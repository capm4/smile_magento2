<?php
/**
 *
 *
 * @catolog   Kruglov
 * @package   Kruglov\NewsTable
 * @copyrigth 15.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\NewsTable\Model\Config\Source;


use Magento\Framework\Option\ArrayInterface;

/**
 * Class Currency
 * @package Kruglov\NewsTable\Model\Config\Source
 */
class Currency implements ArrayInterface
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
                'value' => 'ua',
                'label' => __('Grivna')
            ],
            [
                'value' => 'usd',
                'label' => __('Dolar')
            ],
            [
                'value' => 'ru',
                'label' => __('Rube')
            ],
            [
                'value' => 'eu',
                'label' => __('Euro')
            ]
        ];
    }
}