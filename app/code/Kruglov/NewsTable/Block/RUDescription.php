<?php
/**
 * Block for currency ruble
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */
namespace Kruglov\NewsTable\Block;


/**
 * Class RUDescription
 * @package Kruglov\NewsTable\Block
 */

class RUDescription extends \Magento\Framework\View\Element\Template
{
    /**
     * @var string
     */
    protected  $text = "The ruble or rouble (/ˈruːbəl/; Russian: рубль, IPA: [rublʲ]) is or was a currency";


    /**
     * @return string
     */
    public function geText(){
        return $this->text;
    }

}