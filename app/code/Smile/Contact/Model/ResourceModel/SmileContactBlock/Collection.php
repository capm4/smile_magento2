<?php
/**
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Model\ResourceModel\SmileContactBlock;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Smile\Contact\Api\Data\SmileContactInterface;


/**
 * Class Collection
 * @package Smile\Contact\Model\ResourceModel\SmileContactBlock
 */
class Collection extends AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = SmileContactInterface::ID;

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = SmileContactInterface::TABLE_NAME . '_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = SmileContactInterface::TABLE_NAME . '_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Smile\Contact\Model\SmileContact', 'Smile\Contact\Model\ResourceModel\SmileContactResource');
    }
}