<?php
/**
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Kruglov\NewsTable\Setup
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $setup->getTable('smile_contact_table')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true
            ],
            'ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [
                'nullable' => false,
            ],
            'NAME'
        )->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [
                'nullable' => false,
            ],
            'EMAIL'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            250,
            [
                'nullable' => false,
            ],
            'NAME'
        )->addColumn(
            'phone_number',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            15,
            [
                'nullable' => true,
                'default' => null
            ],
            'PHONE NUMBER'
        )->addColumn(
            'question',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [
                'nullable' => false,
            ],
            'QUESTION'
        )->addColumn(
            'answer',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [
                'nullable' => true,
            ],
            'Answer'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            2,
            [
                'nullable' => false,
                'default' => 1
            ],
            'IS_ACTIVE'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP ,
            null,
            [
                'nullable' => false,
            ],
            'CREATE TIME'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
            ],
            'UPDATE TIME'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}