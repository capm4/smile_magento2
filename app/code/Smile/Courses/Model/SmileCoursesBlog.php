<?php
/**
 * Created by PhpStorm.
 * User: vipya
 * Date: 23.04.18
 * Time: 20:15
 */

namespace Smile\Courses\Model;

use Magento\Framework\Model\AbstractModel;
use Smile\Courses\Api\Data\SmileCoursesBlogInterface;

class SmileCoursesBlog extends AbstractModel implements SmileCoursesBlogInterface
{
    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = SmileCoursesBlogInterface::ID;

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(SmileCoursesBlogInterface::TITLE);
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return SmileCoursesBlogInterface
     */
    public function setTitle($title)
    {
        $this->setData(SmileCoursesBlogInterface::TITLE, $title);

        return $this;
    }

    /**
     * Get desc
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getData(SmileCoursesBlogInterface::CONTENT);
    }

    /**
     * Set desc
     *
     * @param string $content
     *
     * @return SmileCoursesBlogInterface
     */
    public function setContent($content)
    {
        $this->setData(SmileCoursesBlogInterface::CONTENT, $content);

        return $this;
    }

    /**
     * Get ident
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->getData(SmileCoursesBlogInterface::IDENTIFIER);
    }

    /**
     * Set ident
     *
     * @param string $identifier
     *
     * @return SmileCoursesBlogInterface
     */
    public function setIdentifier($identifier)
    {
        $this->setData(SmileCoursesBlogInterface::IDENTIFIER, $identifier);

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->getData(SmileCoursesBlogInterface::AUTHOR);
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return SmileCoursesBlogInterface
     */
    public function setAuthor($author)
    {
        $this->setData(SmileCoursesBlogInterface::AUTHOR, $author);

        return $this;
    }

    /**
     * Get is active
     *
     * @return bool
     */
    public function isActive()
    {
        return (bool) $this->getData(SmileCoursesBlogInterface::IS_ACTIVE);
    }

    /**
     * Set author
     *
     * @param bool $isActive
     *
     * @return SmileCoursesBlogInterface
     */
    public function setIsActive($isActive)
    {
        $this->setData(SmileCoursesBlogInterface::IS_ACTIVE, (bool) $isActive);

        return $this;
    }
}