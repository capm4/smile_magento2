<?php
/**
 * SmileContact Repository
 *
 * @catalog   Smile
 * @package   Smile\Contact
 * @copyrigth 21.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Smile\Contact\Model;


use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Smile\Contact\Api\Data;
use Smile\Contact\Api\SmileContactRepositoryInterface;
use Smile\Contact\Model\ResourceModel\SmileContactResource;
use Smile\Contact\Model\ResourceModel\SmileContactBlock\CollectionFactory  as SmileContactCollection;

/**
 * Class SmileContactRepository
 * @package Smile\Contact\Model
 */
class SmileContactRepository implements SmileContactRepositoryInterface
{
    /**
     * @var SmileContactResource
     */
    protected $smileContactResource;

    /**
     * @var Data\SmileContactInterfaceFactory
     */
    protected $smileContactInterfaceFactory;

    /**
     * @var SmileContactCollection
     */
    protected $smileContactCollectionFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var \Magento\Framework\Api\SearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * SmileContactRepository constructor.
     * @param SmileContactResource $smileContactResource
     * @param Data\SmileContactInterfaceFactory $smileContactInterfaceFactory
     * @param SmileContactCollection $smileContactCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterfaceFactory $searchResults
     */
    public function __construct(
        SmileContactResource $smileContactResource,
        Data\SmileContactInterfaceFactory  $smileContactInterfaceFactory,
        SmileContactCollection $smileContactCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResults
    )
    {
        $this->smileContactResource = $smileContactResource;
        $this->smileContactInterfaceFactory = $smileContactInterfaceFactory;
        $this->smileContactCollectionFactory  = $smileContactCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResults;
    }


    /**
     * @param Data\SmileContactInterface $item
     * @return Data\SmileContactInterface
     * @throws CouldNotSaveException
     */
    public function save(Data\SmileContactInterface $item)
    {
        try{
            $this->smileContactResource->save($item);

        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $item;
    }

    /**
     * @param int $itemId
     * @return Data\SmileContactInterface
     */
    public function getById($itemId)
    {
        $entity = $this->smileContactInterfaceFactory->create();
        try {
            $this->smileContactResource->load($entity, $itemId);
        } catch (NoSuchEntityException $e) {
            $entity = $this->smileContactInterfaceFactory->create();
        }

        return $entity;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var Collection $collection */
        $collection = $this->smileContactCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param Data\SmileContactInterface $item
     *
     * @return mixed
     * @throws CouldNotSaveException
     */
    public function delete(Data\SmileContactInterface $item)
    {
        try {
            $this->smileContactResource->delete($item);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * @param int $itemId
     *
     * @return Data\SmileContactInterface
     * @throws CouldNotSaveException
     */
    public function deleteById($itemId)
    {
        return $this->delete($this->getById($itemId));
    }
}