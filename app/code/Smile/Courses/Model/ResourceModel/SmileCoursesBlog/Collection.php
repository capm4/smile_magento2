<?php
/**
 * Created by PhpStorm.
 * User: vipya
 * Date: 23.04.18
 * Time: 20:55
 */

namespace Smile\Courses\Model\ResourceModel\SmileCoursesBlog;

use Magento\Cms\Model\ResourceModel\AbstractCollection;
use Magento\Store\Model\Store;
use Smile\Courses\Api\Data\SmileCoursesBlogInterface;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = SmileCoursesBlogInterface::ID;

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = SmileCoursesBlogInterface::TABLE_NAME . '_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = SmileCoursesBlogInterface::TABLE_NAME . '_collection';

    /**
     * Add filter by store
     *
     * @param int|array|Store $store
     * @param bool            $withAdmin
     *
     * @return $this
     */
    public function addStoreFilter($store, $withAdmin = true)
    {
        return $this;
    }
}