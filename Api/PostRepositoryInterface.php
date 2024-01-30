<?php
declare(strict_types=1);

namespace MageMastery\Blog\Api;
use MageMastery\Blog\Api\Data\PostInterface;

interface PostRepositoryInterface
{
    /**
     * @param \MageMastery\Blog\Api\Data\PostInterface $post
     * @return int
     */
    public function save(PostInterface $post): int;

    /**
     * @param \MageMastery\Blog\Api\Data\PostInterface $post
     * @return bool
     */
    public function delete(PostInterface $post): bool;

    /**
     * Delete post by ID.
     *
     * @param int $postId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $postId): bool;
    /**
     * @param int $postId
     * @return \MageMastery\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $postId): PostInterface;

    /**
     * Retrieve posts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MageMastery\Blog\Api\Data\PostSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
