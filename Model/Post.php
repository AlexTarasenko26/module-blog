<?php
declare(strict_types=1);

namespace MageMastery\Blog\Model;

use MageMastery\Blog\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;
use MageMastery\Blog\Model\ResourceModel\Post as PostResource;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(PostResource::class);
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return (int) $this->getData(self::POST_ID);
    }

    /**
     * @param int $postId
     * @return void
     */
    public function setPostId(int $postId): void
    {
        $this->setData(self::POST_ID, $postId);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getData(self::TITLE)??'';
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->setData(self::TITLE, $title);
    }

    public function getUrlKey(): string
    {
        return $this->getData(self::URL_KEY);
    }

    /**
     * @param string $urlKey
     * @return void
     */
    public function setUrlKey(string $urlKey): void
    {
        $this->setData(self::URL_KEY, $urlKey);
    }

    public function getMetaKeywords(): string
    {
        return $this->getData(self::META_KEYWORDS)??'';
    }

    /**
     * @param string $metaKeywords
     * @return void
     */
    public function setMetaKeywords(string $metaKeywords): void
    {
        $this->setData(self::META_KEYWORDS, $metaKeywords);
    }

    /**
     * @return string
     */
    public function getMetaDescription(): string
    {
        return $this->getData(self::META_DESCRIPTION)??'';
    }

    /**
     * @param string $metaDescription
     * @return void
     */
    public function setMetaDescription(string $metaDescription): void
    {
        $this->setData(self::META_DESCRIPTION, $metaDescription);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->getData(self::CONTENT)??'';
    }

    /**
     * @param string $content
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->setData(self::CONTENT, $content);
    }

    /**
     * @return string
     */
    public function getCreationTime(): string
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * @param string $creationTime
     * @return void
     */
    public function setCreationTime(string $creationTime): void
    {
        $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * @return string
     */
    public function getUpdateTime(): string
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * @param string $updateTime
     * @return void
     */
    public function setUpdateTime(string $updateTime): void
    {
        $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * @return string
     */
    public function getMetaTitle(): string
    {
        return $this->getData(self::META_TITLE)??'';
    }

    /**
     * @param string $metaTitle
     * @return void
     */
    public function setMetaTitle(string $metaTitle): void
    {
        $this->setData(self::META_TITLE, $metaTitle);
    }

    /**
     * @return string
     */
    public function getFeaturedImage(): string
    {
        return $this->getData(self::FEATURED_IMAGE)??'';
    }

    /**
     * @param string $featuredImage
     * @return void
     */
    public function setFeaturedImage(string $featuredImage): void
    {
        $this->setData(self::FEATURED_IMAGE, $featuredImage);
    }
}
