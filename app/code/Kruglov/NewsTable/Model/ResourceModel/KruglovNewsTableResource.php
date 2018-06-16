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

namespace Kruglov\NewsTable\Model\ResourceModel;


use Kruglov\NewsTable\Api\Data\KruglovNewsTableInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class KruglovNewsTableResource extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(KruglovNewsTableInterface::TABLE_NAME, KruglovNewsTableInterface::ID);
    }
}