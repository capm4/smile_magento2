<?php
/**
 * Block for currency grivna
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */

namespace Kruglov\NewsTable\Block;


/**
 * Class UADescription
 * @package Kruglov\NewsTable\Block
 */

class UADescription extends \Magento\Framework\View\Element\Template
{
    /**
     * @var string
     */
    protected  $text = "The currency of Kievan Rus' in the eleventh century was called grivna.";


    /**
     * @return string
     */
    public function geText(){
        return $this->text;
    }

}