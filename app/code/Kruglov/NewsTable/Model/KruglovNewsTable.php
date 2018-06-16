<?php
/**
 *
 * @catalog   Kruglov
 * @package   Krugloc/NewsTable
 * @copyrigth 18.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\NewsTable\Model;

use Kruglov\NewsTable\Api\Data\KruglovNewsTableInterface;
use Kruglov\NewsTable\Api\Data\KruglovNewsTableInterfacenterface;
use Kruglov\NewsTable\Model\ResourceModel\KruglovNewsTableResource;
use Magento\Framework\Model\AbstractModel;

/**
 * Class KruglovNewsTable
 * @package Kruglov\NewsTable\Model
 */
class KruglovNewsTable extends AbstractModel implements KruglovNewsTableInterface
{

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = KruglovNewsTableInterface::ID;

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(KruglovNewsTableResource::class);
    }
    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
       return $this->getData(KruglovNewsTableInterface::TITLE);
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return KruglovNewsTableInterface
     */
    public function setTitle($title)
    {
        $this->setData(KruglovNewsTableInterface::TITLE, $title);
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(KruglovNewsTableInterface::DESCRIPTION);
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return KruglovNewsTableInterface
     */
    public function setDescription($description)
    {
       $this->setData(KruglovNewsTableInterface::DESCRIPTION, $description);
       return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->getData(KruglovNewsTableInterface::RATE);
    }

    /**
     * Set rate
     *
     * @param string $rate
     * @return KruglovNewsTableInterface
     */
    public function setRate($rate)
    {
       $this->setData(KruglovNewsTableInterface::RATE, $rate);
       return $this;
    }

    /**
     * Get image url
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getData(KruglovNewsTableInterface::IMAGE);
    }

    /**
     * Set image
     *
     * @param string $image
     * @return KruglovNewsTableInterface
     */
    public function setImage($image)
    {
        $this->setData(KruglovNewsTableInterface::IMAGE, $image);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(KruglovNewsTableInterface::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(KruglovNewsTableInterface::UPDATE_TIME);
    }

    /**
     * @param null $creationTime
     * @return KruglovNewsTableInterfacenterface|void
     */
    public function setCreationTime($creationTime = null)
    {
        $this->setData(KruglovNewsTableInterface::CREATION_TIME, $creationTime);
    }

    /**
     * @param null $updateTime
     * @return KruglovNewsTableInterface|void
     */
    public function setUpdateTime($updateTime = null)
    {
        $this->setData(KruglovNewsTableInterface::UPDATE_TIME, $updateTime);
    }
}