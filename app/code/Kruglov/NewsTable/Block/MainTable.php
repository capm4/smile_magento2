<?php

/**
 * Block for currency table
 *
 * @catolog Kruglov
 * @package Kruglov\NewsTable
 * @copyright 2018
 * @author  Kruglov Alexandr
 *
 */

namespace Kruglov\NewsTable\Block;
use function GuzzleHttp\Promise\all;
use Kruglov\NewsTable\Model\KruglovNewsTableRepository;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\View\Element\Template;

/**
 * Class MainTable
 * @package Kruglov\NewsTable\Block
 */


class MainTable extends \Magento\Framework\View\Element\Template
{

    /**
     * @var KruglovNewsTableRepository
     */
    protected $kruglovNewsRepository;

    /**
     * @var SearchCriteriaInterface
     */
    protected $searchCriteria;

    /**
     * MainTable constructor.
     * @param Template\Context $context
     * @param array $data
     * @param KruglovNewsTableRepository $kruglovNewsRepository
     * @param SearchCriteriaInterface $searchCriteria
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        KruglovNewsTableRepository $kruglovNewsRepository,
        SearchCriteriaInterface $searchCriteria
)
    {
        $this->kruglovNewsRepository = $kruglovNewsRepository;
        $this->searchCriteria = $searchCriteria;
        parent::__construct($context, $data);
    }


    

    /**
     * @return collection of exchange rate
     */
    public function getList(){

       $repository =  $this->kruglovNewsRepository->getList($this->searchCriteria);
        return $repository;
    }

}