<?php
/**
 * Option Class for  is Active
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */
namespace Smile\Contact\Model\Source;


use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class IsActive
 * @package Smile\Contact\Model\Source
 */
class IsActive implements OptionSourceInterface
{
    /**
     * @var \Magento\Cms\Model\Page
     */
    protected $smileContact;

    /**
     * IsActive constructor.
     * @param \Smile\Contact\Model\SmileContact $smileContact
     */
    public function __construct(\Smile\Contact\Model\SmileContact $smileContact)
    {
        $this->smileContact = $smileContact;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->smileContact->getStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
