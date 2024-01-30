<?php

declare(strict_types=1);

namespace MageMastery\Blog\ViewModel;

use MageMastery\Blog\Model\Post;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\StoreManagerInterface;

class PostViewModel implements ArgumentInterface
{
    /**
     * @param UrlInterface $url
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        private UrlInterface $url,
        private StoreManagerInterface $storeManager
    ) {}

    /**
     * @param Post $post
     * @return string
     */
    public function getPostUrl(Post $post): string
    {
        return $this->url->getBaseUrl() . 'blog/' . $post->getData('url_key');
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
