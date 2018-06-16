<?php

/**
 * Block for currency euro
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */

namespace Kruglov\NewsTable\Block;



/**
 * Class EURDescription
 * @package Kruglov\NewsTable\Block
 */

class EURDescription extends \Magento\Framework\View\Element\Template
{
    /**
     * @var string
     */
    protected  $text = "He euro (sign: €; code: EUR) is the official currency of the European Union.";

    /**
     * @return string
     */
    public function geText(){
        return $this->text;
    }

}