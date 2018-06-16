<?php
/**
 * Block for frontend Question form
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Block;


use Magento\Framework\View\Element\Template;

/**
 * Class ContactForm
 * @package Smile\Contact\Block
 */
class ContactForm extends Template
{

    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }

    /**
     * Return save form action url
     *
     * @return string
     */
    public function getActionUrl()
    {
        return $this->getUrl('smilecontact/contact/save', ['_secure' => true]);
    }
}