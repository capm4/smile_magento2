<?php
/**
 *
 *
 * @catalog   Kruglov
 * @package   ${PACKAGE}
 * @copyrigth Kruglov\NewsTable
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\AddTable\Setup;




use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

//        $setup->startSetup();


//
//        $setup->getConnection()->addColumn($setup->getTable('kruglov_news_table'),
//            'description',
//            [
//                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                'length' => 255,
//                'nullable' => false,
//                'comment' => 'DESCRIPTION'
//            ]
//
//        );
//        $setup->getConnection()->addColumn($setup->getTable('kruglov_news_table'),
//            'rate',
//            [
//                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
//                'length' => 10,
//                'nullable' => false,
//                'comment' => 'RATE'
//            ]
//
//        );
//        $setup->getConnection()->addColumn($setup->getTable('kruglov_news_table'),
//            'image',
//            [
//                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                'length' => 255,
//                'nullable' => true,
//                'comment' => 'IMAGE'
//            ]
//
//        );
//
//        $setup->getConnection()->dropColumn($setup->getTable('kruglov_news_table'), 'identifier');
//        $setup->getConnection()->dropColumn($setup->getTable('kruglov_news_table'), 'author');
//        $setup->getConnection()->dropColumn($setup->getTable('kruglov_news_table'), 'content');
//        $setup->getConnection()->dropColumn($setup->getTable('kruglov_news_table'), 'is_active');
//        $setup->endSetup();


//        $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);
//
//        // add customer_attribute to customer
//        $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY, 'customer_attribute');
//        $eavSetup->addAttribute(
//            \Magento\Customer\Model\Customer::ENTITY, 'customer_attribute', [
//                'type' => 'varchar',
//                'label' => 'Customer Attribute',
//                'input' => 'text',
//                'required' => false,
//                'system' => 0,
//                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
//                'sort_order' => '200'
//            ]
//        );
//
//        // allow customer_attribute attribute to be saved in the specific areas
//        $attribute = $this->_attributeRepository->get('customer', 'customer_attribute');
//        $setup->getConnection()
//            ->insertOnDuplicate(cd //
//                $setup->getTable('customer_form_attribute'),
//                [
//                    ['form_code' => 'adminhtml_customer', 'attribute_id' => $attribute->getId()],
//                    ['form_code' => 'customer_account_create', 'attribute_id' => $attribute->getId()],
//                    ['form_code' => 'customer_account_edit', 'attribute_id' => $attribute->getId()],
//                ]
//            );
    }
}