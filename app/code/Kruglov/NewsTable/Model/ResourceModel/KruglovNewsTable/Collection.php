<?php
/**
 *
 *
 * @catalog   Kruglov
 * @package   Kruglov/NewsTable
 * @copyrigth 18.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\NewsTable\Model\ResourceModel\KruglovNewsTable;


use Kruglov\NewsTable\Api\Data\KruglovNewsTableInterface;

/**
 * Class Collection
 * @package Kruglov\NewsTable\Model\ResourceModel\KruglovNewsTable
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{


    /**
     * @var string
     */
    protected $_idFieldName = KruglovNewsTableInterface::ID;

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = KruglovNewsTableInterface::TABLE_NAME . '_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = KruglovNewsTableInterface::TABLE_NAME . '_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Kruglov\NewsTable\Model\KruglovNewsTable', 'Kruglov\NewsTable\Model\ResourceModel\KruglovNewsTableResource');
    }
}