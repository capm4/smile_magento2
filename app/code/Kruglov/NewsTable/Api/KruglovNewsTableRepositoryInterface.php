<?php
/**
 *
 *
 * @catalog   Kruglov
 * @package   Kruglov\NewsTable
 * @copyrigth 18.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\NewsTable\Api;

/**
 * Interface KruglovNewsTableRepositoryInterface
 * @package Kruglov\NewsTable\Api
 */
interface KruglovNewsTableRepositoryInterface
{
    /**
     * @param Data\KruglovNewsTableInterface $item
     *
     * @return Data\KruglovNewsTableInterface
     */
    public function save(Data\KruglovNewsTableInterface $item);

    /**
     * @param int $itemId
     *
     * @return Data\KruglovNewsTableInterface
     */
    public function getById($itemId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param Data\KruglovNewsTableInterface $item
     *
     * @return mixed
     */
    public function delete(Data\KruglovNewsTableInterface $item);

    /**
     * @param int $itemId
     *
     * @return Data\KruglovNewsTableInterface
     */
    public function deleteById($itemId);

}