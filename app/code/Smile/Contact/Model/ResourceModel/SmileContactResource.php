<?php
/**
 * Resource class
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Smile\Contact\Api\Data\SmileContactInterface;

/**
 * Class SmileContactResource
 * @package Smile\Contact\Model\ResourceModel
 */
class SmileContactResource extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(SmileContactInterface::TABLE_NAME, SmileContactInterface::ID);
    }
}