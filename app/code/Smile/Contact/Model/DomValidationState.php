<?php
/**
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */
namespace Smile\Contact\Model;

/**
 * Class DomValidationState
 * @package Smile\Contact\Model
 */
class DomValidationState implements \Magento\Framework\Config\ValidationStateInterface
{
    /**
     * Retrieve validation state
     * Used in smile contact post processor to force validate layout update xml
     *
     * @return boolean
     */
    public function isValidationRequired()
    {
        return true;
    }
}
