<?php
/**
 *
 *
 * @catalog   ${CATALOG}
 * @package   ${PACKAGE}
 * @copyrigth 19.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\AddTable\Setup;

use Kruglov\NewsTable\Model\KruglovNewsTableInterfaceFactory;
use Kruglov\NewsTable\Model\KruglovNewsTableRepository;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements installDataInterface
{
    /**
     * @var KruglovNewsTableInterfaceFactory
     */
    protected $kruglovNewsTable;

    /**
     * @var KruglovNewsTableRepository
     */
    protected $kruglovNewsTableRepository;


    /**
     * UpgradeData constructor.
     * @param KruglovNewsTable $kruglovNewsTable
     * @param KruglovNewsTableRepository $kruglovNewsTableRepository
     */
    public function __construct(
        KruglovNewsTableInterfaceFactory $kruglovNewsTable,
        KruglovNewsTableRepository $kruglovNewsTableRepository
    ) {
        $this->kruglovNewsTable = $kruglovNewsTable;
        $this->kruglovNewsTableRepository = $kruglovNewsTableRepository;
    }
    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $kruglovNewsTable = $this->kruglovNewsTable->create();
        $kruglovNewsTable->setTitle('UA');
        $kruglovNewsTable->setDescription('The currency of Kievan Rus in the eleventh century was called grivna.');
        $kruglovNewsTable->setRate(1.0);
        $kruglovNewsTable->setImage('images/ua.jpeg');
        $this->kruglovNewsTableRepository->save($kruglovNewsTable);

        $kruglovNewsTable = $this->kruglovNewsTable->create();
        $kruglovNewsTable->setTitle('USD');
        $kruglovNewsTable->setDescription('he euro (sign: €; code: EUR) is the official currency of the European Union');
        $kruglovNewsTable->setRate(0.038);
        $kruglovNewsTable->setImage('images/usd.jpeg');
        $this->kruglovNewsTableRepository->save($kruglovNewsTable);

        $kruglovNewsTable = $this->kruglovNewsTable->create();
        $kruglovNewsTable->setTitle('EUR');
        $kruglovNewsTable->setDescription('He euro (sign: €; code: EUR) is the official currency of the European Union.');
        $kruglovNewsTable->setRate(0.031);
        $kruglovNewsTable->setImage('images/eur.jpeg');
        $this->kruglovNewsTableRepository->save($kruglovNewsTable);

        $kruglovNewsTable = $this->kruglovNewsTable->create();
        $kruglovNewsTable->setTitle('ru');
        $kruglovNewsTable->setDescription('The ruble or rouble (/ˈruːbəl/; Russian: рубль, IPA: [rublʲ]) is or was a currency');
        $kruglovNewsTable->setRate(2.43);
        $kruglovNewsTable->setImage('images/ru.jpeg');
        $this->kruglovNewsTableRepository->save($kruglovNewsTable);
    }
}