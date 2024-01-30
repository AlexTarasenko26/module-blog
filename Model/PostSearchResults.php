<?php
declare(strict_types=1);

namespace MageMastery\Blog\Model;

use MageMastery\Blog\Api\Data\PostSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

class PostSearchResults extends SearchResults implements PostSearchResultsInterface
{
}
