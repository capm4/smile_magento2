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

namespace Kruglov\NewsTable\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
//        $installer = $setup;
//
//        $installer->startSetup();
//
//        $table = $installer->getConnection()->newTable(
//            $setup->getTable('kruglov_news_table')
//        )->addColumn(
//            'id',
//            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//            10,
//            [
//                'identity' => true,
//                'nullable' => false,
//                'primary' => true
//            ],
//            'ID'
//        )->addColumn(
//            'title',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//            255,
//            [
//                'nullable' => false,
//            ],
//            'TITLE'
//        )->addColumn(
//            'identifier',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//            255,
//            [
//                'nullable' => false,
//            ],
//            'IDENTIFIER'
//        )->addColumn(
//            'author',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//            255,
//            [
//                'nullable' => false,
//            ],
//            'AUTHOR'
//        )->addColumn(
//            'content',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//            255,
//            [
//                'nullable' => false,
//            ],
//            'CONTENT'
//        )->addColumn(
//            'is_active',
//            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
//            255,
//            [
//                'nullable' => false,
//                'default' => 1
//            ],
//            'IS_ACTIVE'
//        )->addColumn(
//            'creation_time',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//            null,
//            [
//                'nullable' => false,
//            ],
//            'Time create'
//        )->addColumn(
//            'update_time',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//            null,
//            [
//                'nullable' => false,
//            ],
//            'Time of update'
//        );
//        $installer->getConnection()->createTable($table);
//        $installer->endSetup();
    }
}