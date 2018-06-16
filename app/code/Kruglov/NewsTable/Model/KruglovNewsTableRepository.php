<?php
/**
 *
 *
 * @catalog   ${CATALOG}
 * @package   ${PACKAGE}
 * @copyrigth 18.05.18
 * @author    Kruglov Aleksander
 *
 */

namespace Kruglov\NewsTable\Model;



use Kruglov\NewsTable\Api\Data;
use Kruglov\NewsTable\Api\KruglovNewsTableRepositoryInterface;
use Kruglov\NewsTable\Model\ResourceModel\KruglovNewsTable\CollectionFactory as KruglovNewsTableCollection;
use Kruglov\NewsTable\Model\ResourceModel\KruglovNewsTableResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class KruglovNewsTableRepository implements KruglovNewsTableRepositoryInterface
{
    /**
     * @var ResourceModel\KruglovNewsTableResource
     */
    protected $kruglovNewsTableResource;

    /**
     * @var KruglovNewsTableInterfaceFactory
     */
    protected $kruglovNewsTableInterfaceFactory;

    /**
     * @var KruglovNewsTableCollectionFactory
     */
    protected $kruglovNewsTableCollectionFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var \Magento\Framework\Api\SearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * KruglovNewsTableRepository constructor.
     */
    public function __construct(
        KruglovNewsTableResource $kruglovNewsTableResource,
        Data\KruglovNewsTableInterfaceFactory $kruglovNewsTableInterfaceFactory,
        KruglovNewsTableCollection $kruglovNewsTableCollection,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        \Magento\Framework\Api\SearchResultsInterfaceFactory $searchResults
    )
    {
        $this->kruglovNewsTableResource = $kruglovNewsTableResource;
        $this->kruglovNewsTableInterfaceFactory = $kruglovNewsTableInterfaceFactory;
        $this->kruglovNewsTableCollectionFactory  = $kruglovNewsTableCollection;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResults;
    }


    /**
     * @param Data\KruglovNewsTableInterface $item
     * @return Data\KruglovNewsTableInterface
     * @throws CouldNotSaveException
     */
    public function save(Data\KruglovNewsTableInterface $item)
    {
        try {
            $this->kruglovNewsTableResource->save($item);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $item;
    }

    /**
     * @param int $itemId
     * @return Data\KruglovNewsTableInterface
     */
    public function getById($itemId)
    {
        $entity = $this->kruglovNewsTableInterfaceFactory->create();
        try {
            $this->kruglovNewsTableResource->load($entity, $itemId);
        } catch (NoSuchEntityException $e) {
            $entity = $this->kruglovNewsTableInterfaceFactory->create();
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
        $collection = $this->kruglovNewsTableCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param KruglovNewsTableInterface $item
     *
     * @return mixed
     * @throws CouldNotSaveException
     */
    public function delete(Data\KruglovNewsTableInterface $item)
    {
        try {
            $this->kruglovNewsTableResource->delete($item);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * @param int $itemId
     *
     * @return KruglovNewsTableInterface
     * @throws CouldNotSaveException
     */
    public function deleteById($itemId)
    {
        return $this->delete($this->getById($itemId));
    }
}