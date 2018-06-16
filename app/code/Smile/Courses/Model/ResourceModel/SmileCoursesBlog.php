<?php
namespace Smile\Courses\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Smile\Courses\Api\Data\SmileCoursesBlogInterface;

class SmileCoursesBlog extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(SmileCoursesBlogInterface::TABLE_NAME, SmileCoursesBlogInterface::ID);
    }
}