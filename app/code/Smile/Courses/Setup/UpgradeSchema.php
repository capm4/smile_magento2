<?php
/**
 *
 *
 * @catalog   ${CATALOG}
 * @package   ${PACKAGE}
 * @copyrigth 15.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Courses\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

    }
}