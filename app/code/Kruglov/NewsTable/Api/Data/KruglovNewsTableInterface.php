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

namespace Kruglov\NewsTable\Api\Data;


/**
 * Interface KruglovNewsTableInterface
 * @package Kruglov\NewsTable\Api\Data
 */
interface KruglovNewsTableInterface
{
    /**#@+
     * Consts table columns
     */
    const ID            = 'id';
    const TITLE         = 'title';
    const DESCRIPTION   = 'description';
    const RATE          = 'rate';
    const IMAGE         = 'image';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';
    /**@#-*/




    /**
     *Table name
     */
    const TABLE_NAME = 'kruglov_news_table';



    /**
     * Get title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set title
     *
     * @param string $title
     *
     * @return KruglovNewsTableInterface
     */
    public function setTitle($title);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set description
     *
     * @param string $description
     *
     * @return KruglovNewsTableInterface
     */
    public function setDescription($description);

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate();

    /**
     * Set rate
     *
     * @param string $rate
     * @return KruglovNewsTableInterface
     */
    public function setRate($rate);

    /**
     * Get image url
     *
     * @return string
     */
    public function getImage();

    /**
     * Set image
     *
     * @param string $image
     * @return KruglovNewsTableInterface
     */
    public function setImage($image);

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return KruglovNewsTableInterfacenterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return KruglovNewsTableInterface
     */
    public function setUpdateTime($updateTime);

}