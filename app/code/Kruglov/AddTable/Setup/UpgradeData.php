<?php
/**
 *
 * @catalog   Kruglov
 * @package   Kruglov/NewsTable
 * @copyrigth 18.05.18
 * @author    Kruglov Aleksander
 *
 */
namespace Kruglov\AddTable\Setup;

//
//use Kruglov\NewsTable\Model\KruglovNewsTable;
//use Kruglov\NewsTable\Model\KruglovNewsTableRepository;
//use Kruglov\NewsTable\Api\Data\KruglovNewsTableInterfaceFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Class UpgradeData
 * @package Kruglov\AddTable\Setup
 */
class UpgradeData implements UpgradeDataInterface
{


//    /**
//     * @var KruglovNewsTableInterfaceFactory
//     */
//    protected $kruglovNewsTable;
//
//    /**
//     * @var KruglovNewsTableRepository
//     */
//    protected $kruglovNewsTableRepository;
//
//
//    /**
//     * UpgradeData constructor.
//     * @param KruglovNewsTable $kruglovNewsTable
//     * @param KruglovNewsTableRepository $kruglovNewsTableRepository
//     */
//    public function __construct(
//        KruglovNewsTableInterfaceFactory $kruglovNewsTable,
//        KruglovNewsTableRepository $kruglovNewsTableRepository
//    ) {
//        $this->kruglovNewsTable = $kruglovNewsTable;
//        $this->kruglovNewsTableRepository = $kruglovNewsTableRepository;
//    }

    /**
     * upgrade table kruglov_news_table in module Kruglov_NewsTable
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
//            $kruglovNewsTable = $this->kruglovNewsTable->create();
//            $kruglovNewsTable->setTitle('UA');
//            $kruglovNewsTable->setDescription('The currency of Kievan Rus in the eleventh century was called grivna.');
//            $kruglovNewsTable->setRate(1.0);
//            $kruglovNewsTable->setImage('images/ua.jpeg');
//            $this->kruglovNewsTableRepository->save($kruglovNewsTable);
//
//            $kruglovNewsTable = $this->kruglovNewsTable->create();
//            $kruglovNewsTable->setTitle('USD');
//            $kruglovNewsTable->setDescription('he euro (sign: €; code: EUR) is the official currency of the European Union');
//            $kruglovNewsTable->setRate(0.038);
//            $kruglovNewsTable->setImage('images/usd.jpeg');
//            $this->kruglovNewsTableRepository->save($kruglovNewsTable);
//
//            $$kruglovNewsTable = $this->kruglovNewsTable->create();
//            $kruglovNewsTable->setTitle('EUR');
//            $kruglovNewsTable->setDescription('He euro (sign: €; code: EUR) is the official currency of the European Union.');
//            $kruglovNewsTable->setRate(0.031);
//            $kruglovNewsTable->setImage('images/eur.jpeg');
//            $this->kruglovNewsTableRepository->save($kruglovNewsTable);
//
//            $kruglovNewsTable = $this->kruglovNewsTable->create();
//            $kruglovNewsTable->setTitle('ru');
//            $kruglovNewsTable->setDescription('The ruble or rouble (/ˈruːbəl/; Russian: рубль, IPA: [rublʲ]) is or was a currency');
//            $kruglovNewsTable->setRate(2.43);
//            $kruglovNewsTable->setImage('images/ru.jpeg');
//            $this->kruglovNewsTableRepository->save($kruglovNewsTable);
    }
}
