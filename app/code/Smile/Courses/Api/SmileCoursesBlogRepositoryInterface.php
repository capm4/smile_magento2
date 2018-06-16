<?php
namespace Smile\Courses\Api;

interface SmileCoursesBlogRepositoryInterface
{
    /**
     * @param Data\SmileCoursesBlogInterface $blogItem
     *
     * @return Data\SmileCoursesBlogInterface
     */
    public function save(Data\SmileCoursesBlogInterface $blogItem);

    /**
     * @param int $blogItemId
     *
     * @return Data\SmileCoursesBlogInterface
     */
    public function getById($blogItemId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param Data\SmileCoursesBlogInterface $blogItem
     *
     * @return mixed
     */
    public function delete(Data\SmileCoursesBlogInterface $blogItem);

    /**
     * @param int $blogItemId
     *
     * @return Data\SmileCoursesBlogInterface
     */
    public function deleteById($blogItemId);
}