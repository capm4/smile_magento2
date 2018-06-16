<?php
/**
 * Block for currency dollar
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */

namespace Kruglov\NewsTable\Block;


/**
 * Class USDDescription
 * @package Kruglov\NewsTable\Block
 */

class USDDescription extends \Magento\Framework\View\Element\Template
{
    /**
     * @var string
     */
    protected  $text = "he euro (sign: €; code: EUR) is the official currency of the European Union";

    /**
     * @return string
     */
    public function geText(){
        return $this->text;
    }

}