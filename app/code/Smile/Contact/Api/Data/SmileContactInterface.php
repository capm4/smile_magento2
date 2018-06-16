<?php
/**
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Api\Data;


/**
 * Interface SmileContactInterface
 * @package Smile\Contact\Api\Data
 */
interface SmileContactInterface
{
    /**#@+
     * Consts table columns
     */
    const ID                    = 'id';
    const NAME                  = 'name';
    const EMAIL                 = 'email';
    const TITLE                 = 'title';
    const PHONE_NUMBER          = 'phone_number';
    const QUESTION              = 'question';
    const ANSWER                = 'answer';
    const IS_ACTIVE             = 'is_active';
    const CREATION_TIME         = 'creation_time';
    const UPDATE_TIME           = 'update_time';
    /**@#-*/




    /**
     *Table name
     */
    const TABLE_NAME = 'smile_contact_table';



    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SmileContactInterface
     */
    public function setName($name);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set email
     *
     * @param string $email
     *
     * @return SmileContactInterface
     */
    public function setEmail($email);

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set email
     *
     * @param string $title
     *
     * @return SmileContactInterface
     */
    public function setTitle($title);

    /**
     * Get phone_number
     *
     * @return string
     */
    public function getPhoneNumber();

    /**
     * Set phone_number
     *
     * @param string $phoneNumber
     * @return SmileContactInterface
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Set question
     *
     * @param string $question
     * @return SmileContactInterface
     */
    public function setQuestion($question);

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Set answer
     *
     * @param string $answer
     * @return SmileContactInterface
     */
    public function setAnswer($answer);

    /**
     * Get is active
     *
     * @return bool
     */
    public function isActive();

    /**
     * Set is active
     *
     * @param bool $isActive
     *
     * @return SmileContactInterface
     */
    public function setIsActive($isActive);

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
     * @return SmileContactInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return SmileContactInterface
     */
    public function setUpdateTime($updateTime);}