<?php
namespace Smile\Courses\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Smile\Courses\Api\Data;
use Smile\Courses\Api\SmileCoursesBlogRepositoryInterface;
use Smile\Courses\Model\ResourceModel\SmileCoursesBlog\Collection as SmileCoursesBlogCollection;

class SmileCoursesBlogRepository implements SmileCoursesBlogRepositoryInterface
{
    /**
     * @var ResourceModel\SmileCoursesBlog
     */
    protected $smileCoursesBlogResource;

    /**
     * @var Data\SmileCoursesBlogInterfaceFactory
     */
    protected $smileCoursesBlogInterfaceFactory;

    /**
     * @var SmileCoursesBlogCollectionFactory
     */
    protected $smileCoursesBlogCollectionFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var \Magento\Framework\Api\SearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * SmileCoursesBlogRepository constructor.
     *
     * @param ResourceModel\SmileCoursesBlog                                     $smileCoursesBlogResource
     * @param Data\SmileCoursesBlogInterfaceFactory                              $smileCoursesBlogInterfaceFactory
     * @param SmileCoursesBlogCollectionFactory                                  $smileCoursesBlogCollectionFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param \Magento\Framework\Api\SearchResultsInterface                      $searchResults
     */
    public function __construct(
        \Smile\Courses\Model\ResourceModel\SmileCoursesBlog $smileCoursesBlogResource,
        Data\SmileCoursesBlogInterfaceFactory $smileCoursesBlogInterfaceFactory,
        SmileCoursesBlogCollectionFactory $smileCoursesBlogCollectionFactory,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        \Magento\Framework\Api\SearchResultsInterfaceFactory $searchResults
    ) {
        $this->smileCoursesBlogResource = $smileCoursesBlogResource;
        $this->smileCoursesBlogInterfaceFactory = $smileCoursesBlogInterfaceFactory;
        $this->smileCoursesBlogCollectionFactory = $smileCoursesBlogCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResults;
    }

    /**
     * @param Data\SmileCoursesBlogInterface $blogItem
     *
     * @return Data\SmileCoursesBlogInterface
     * @throws CouldNotSaveException
     */
    public function save(Data\SmileCoursesBlogInterface $blogItem)
    {
        try {
            $this->smileCoursesBlogResource->save($blogItem);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $blogItem;
    }

    /**
     * @param int $blogItemId
     *
     * @return Data\SmileCoursesBlogInterface
     */
    public function getById($blogItemId)
    {
        $entity = $this->smileCoursesBlogInterfaceFactory->create();
        try {
            $this->smileCoursesBlogResource->load($entity, $blogItemId);
        } catch (NoSuchEntityException $e) {
            $entity = $this->smileCoursesBlogInterfaceFactory->create();
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
        /** @var SmileCoursesBlogCollection $collection */
        $collection = $this->smileCoursesBlogCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param Data\SmileCoursesBlogInterface $blogItem
     *
     * @return bool
     *
     * @throws CouldNotSaveException
     */
    public function delete(Data\SmileCoursesBlogInterface $blogItem)
    {
        try {
            $this->smileCoursesBlogResource->delete($blogItem);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * @param int $blogItemId
     *
     * @return bool
     * @throws CouldNotSaveException
     */
    public function deleteById($blogItemId)
    {
        return $this->delete($this->getById($blogItemId));
    }
}