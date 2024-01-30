<?php
declare(strict_types=1);
namespace MageMastery\Blog\Service;

use MageMastery\Blog\Api\Data\PostInterface;
use MageMastery\Blog\Api\Data\PostSearchResultsInterface;
use MageMastery\Blog\Api\Data\PostSearchResultsInterfaceFactory;
use MageMastery\Blog\Api\PostRepositoryInterface;
use MageMastery\Blog\Model\PostFactory;
use MageMastery\Blog\Model\ResourceModel\Post as PostResource;
use MageMastery\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository implements PostRepositoryInterface
{


    /**
     * @param PostResource $postResource
     * @param PostFactory $postFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param PostCollectionFactory $postCollectionFactory
     * @param PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        private readonly PostResource                      $postResource,
        private readonly PostFactory                       $postFactory,
        private readonly CollectionProcessorInterface      $collectionProcessor,
        private readonly PostCollectionFactory             $postCollectionFactory,
        private readonly PostSearchResultsInterfaceFactory $searchResultsFactory
    )
    {

    }

    /**
     * @param PostInterface $post
     * @return int
     * @throws AlreadyExistsException
     */
    public function save(PostInterface $post): int
    {
        $this->postResource->save($post);
        return $post->getPostId();
    }

    /**
     * @param PostInterface $post
     * @return bool
     * @throws \Exception
     */
    public function delete(PostInterface $post): bool
    {
        try {
            $this->postResource->delete($post);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param $postId
     * @return bool
     * @throws NoSuchEntityException
     */
    public function deleteById($postId): bool
    {
        return $this->delete($this->getById($postId));
    }

    /**
     * @param int $postId
     * @return PostInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $postId): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $postId);
        if (!$post->getPostId()) {
            throw new NoSuchEntityException(
                __('There is no post with id %1', $postId)
            );
        }
        return $post;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return PostSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->postCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
