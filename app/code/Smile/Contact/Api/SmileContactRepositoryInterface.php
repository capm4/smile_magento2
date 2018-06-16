<?php
/**
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Api;


/**
 * Interface SmileContactRepositoryInterface
 * @package Smile\Contact\Api
 */
interface SmileContactRepositoryInterface
{
    /**
     * @param Data\SmileContactInterface $item
     *
     * @return Data\SmileContactInterface
     */
    public function save(Data\SmileContactInterface $item);

    /**
     * @param int $itemId
     *
     * @return Data\SmileContactInterface
     */
    public function getById($itemId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param Data\SmileContactInterface $item
     *
     * @return mixed
     */
    public function delete(Data\SmileContactInterface $item);

    /**
     * @param int $itemId
     *
     * @return Data\SmileContactInterface
     */
    public function deleteById($itemId);
}