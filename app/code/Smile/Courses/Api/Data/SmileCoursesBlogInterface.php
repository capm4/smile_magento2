<?php
/**
 * Smile Course blog model Interface
 *
 * @category  Smile
 * @package   Smile\Cources
 * @author    Vitaliy Pyatin <mail.pyvil@gmail.com>
 * @copyright 2018 Vitaliy Pyatin
 */
namespace Smile\Courses\Api\Data;

/**
 * Interface SmileCoursesBlogInterface
 * @package Smile\Courses\Api\Data
 */
interface SmileCoursesBlogInterface
{
    /**#@+
     * Consts table columns
     */
    const ID            = 'id';
    const TITLE         = 'title';
    const IDENTIFIER    = 'identifier';
    const AUTHOR        = 'author';
    const CONTENT       = 'content';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';
    const IS_ACTIVE     = 'is_active';
    /**@#-*/

    /**
     *
     */
    const TABLE_NAME = 'smile_courses_blog';

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
     * @return SmileCoursesBlogInterface
     */
    public function setTitle($title);

    /**
     * Get desc
     *
     * @return string
     */
    public function getContent();

    /**
     * Set desc
     *
     * @param string $content
     *
     * @return SmileCoursesBlogInterface
     */
    public function setContent($content);

    /**
     * Get ident
     *
     * @return string
     */
    public function getIdentifier();

    /**
     * Set ident
     *
     * @param string $identifier
     *
     * @return SmileCoursesBlogInterface
     */
    public function setIdentifier($identifier);

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor();

    /**
     * Set author
     *
     * @param string $author
     *
     * @return SmileCoursesBlogInterface
     */
    public function setAuthor($author);

    /**
     * Get is active
     *
     * @return bool
     */
    public function isActive();

    /**
     * Set author
     *
     * @param bool $isActive
     *
     * @return SmileCoursesBlogInterface
     */
    public function setIsActive($isActive);
}