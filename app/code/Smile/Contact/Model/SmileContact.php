<?php
/**
 * SmileContact model
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Model;


use Smile\Contact\Api\Data\SmileContactInterface;
use Smile\Contact\Model\ResourceModel\SmileContactResource;
use Magento\Framework\Model\AbstractModel;

/**
 * Class SmileContact
 * @package Smile\Contact\Model
 */
class SmileContact  extends AbstractModel implements SmileContactInterface
{
    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = SmileContactInterface::ID;
    /**#@+
     * Question Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**#@-*/

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(SmileContactResource::class);
    }

    /**
     * Prepare questions statuses.
     *
     * @return array
     */
    public function getStatuses()
    {
        return [self::STATUS_ENABLED => __('Not Answer'), self::STATUS_DISABLED => __('Complete')];
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(SmileContactInterface::NAME);
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SmileContactInterface
     */
    public function setName($name)
    {
        $this->setData(SmileContactInterface::NAME, $name);
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(SmileContactInterface::EMAIL);
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return SmileContactInterface
     */
    public function setEmail($email)
    {
        $this->setData(SmileContactInterface::EMAIL, $email);
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(SmileContactInterface::TITLE);
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return SmileContactInterface
     */
    public function setTitle($title)
    {
        $this->setData(SmileContactInterface::TITLE, $title);
        return $this;
    }

    /**
     * Get phone_number
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getData(SmileContactInterface::PHONE_NUMBER);
    }

    /**
     * Set phone_number
     *
     * @param string $phoneNumber
     * @return SmileContactInterface
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->setData(SmileContactInterface::PHONE_NUMBER, $phoneNumber);
        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->getData(SmileContactInterface::QUESTION);
    }

    /**
     * Set question
     *
     * @param string $question
     * @return SmileContactInterface
     */
    public function setQuestion($question)
    {
        $this->setData(SmileContactInterface::QUESTION, $question);
        return $this;
    }

    /**
     * Get is active
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->getData(SmileContactInterface::IS_ACTIVE);
    }

    /**
     * Set is active
     *
     * @param bool $isActive
     *
     * @return SmileContactInterface
     */
    public function setIsActive($isActive)
    {
        $this->setData(SmileContactInterface::IS_ACTIVE, $isActive);
        return $this;
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(SmileContactInterface::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(SmileContactInterface::UPDATE_TIME);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return SmileContactInterface
     */
    public function setCreationTime($creationTime)
    {
        $this->setData(SmileContactInterface::CREATION_TIME, $creationTime);
        return $this;
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return SmileContactInterface
     */

    public function setUpdateTime($updateTime)
    {
        $this->setData(SmileContactInterface::UPDATE_TIME, $updateTime);
        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(SmileContactInterface::ANSWER);
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return SmileContactInterface
     */
    public function setAnswer($answer)
    {
        $this->setData(SmileContactInterface::ANSWER, $answer);
        return $this;
    }
}