<?php
declare(strict_types=1);

namespace MageMastery\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for cms block search results.
 * Api
 * */
interface PostSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get blocks list.
     * @return \MageMastery\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     * @param \MageMastery\Blog\Api\Data\PostInterface[] $items
     * @return PostSearchResultsInterface
     */
    public function setItems(array $items);
}
