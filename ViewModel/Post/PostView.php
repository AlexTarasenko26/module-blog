<?php
declare(strict_types=1);

namespace MageMastery\Blog\ViewModel\Post;

use MageMastery\Blog\Model\Post;
use MageMastery\Blog\Model\ResourceModel\Post\Collection;
use MageMastery\Blog\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\StoreManagerInterface;

class PostView implements ArgumentInterface
{

    /**
     * @param RequestInterface $request
     * @param CollectionFactory $collectionFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        private RequestInterface  $request,
        private CollectionFactory $collectionFactory,
        private StoreManagerInterface $storeManager
    )
    {
    }

    /**
     * @return Post
     */
    public function getPost(): Post
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('post_id', (int)$this->request->getParam('post_id'));

        return $collection->getFirstItem();
    }

    /**
     * @param Post $post
     * @return string
     * @throws NoSuchEntityException
     */
    public function getFeaturedImageUrl(Post $post): string
    {
        $fileName = $post->getData('featured_image');
        $imgPath = 'tmp/imageUploader/images';
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl . $imgPath . '/' . $fileName;
    }
}