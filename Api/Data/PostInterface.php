<?php
declare(strict_types=1);

namespace MageMastery\Blog\Api\Data;

interface PostInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const POST_ID = 'post_id';
    const URL_KEY = 'url_key';
    const TITLE = 'title';
    const META_TITLE = 'meta_title';
    const META_DESCRIPTION = 'meta_description';
    const META_KEYWORDS = 'meta_keywords';
    const CONTENT = 'content';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';
    const FEATURED_IMAGE = 'featured_image';

    /**
     * @return int
     */
    public function getPostId(): int;

    /**
     * @param int $postId
     * @return void
     */
    public function setPostId(int $postId): void;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void;

    /**
     * @return string
     */
    public function getUrlKey(): string;

    /**
     * @param string $urlKey
     * @return void
     */
    public function setUrlKey(string $urlKey): void;

    /**
     * @return string
     */
    public function getMetaKeywords(): string;

    /**
     * @param string $metaKeywords
     * @return void
     */
    public function setMetaKeywords(string $metaKeywords): void;

    /**
     * @return string
     */
    public function getMetaDescription(): string;

    /**
     * @param string $metaDescription
     * @return void
     */
    public function setMetaDescription(string $metaDescription): void;

    /**
     * @return string
     */
    public function getContent(): string;

    /**
     * @param string $content
     * @return void
     */
    public function setContent(string $content): void;

    /**
     * @return string
     */
    public function getCreationTime(): string;

    /**
     * @param string $creationTime
     * @return void
     */
    public function setCreationTime(string $creationTime): void;

    /**
     * @return string
     */
    public function getUpdateTime(): string;

    /**
     * @param string $updateTime
     * @return void
     */
    public function setUpdateTime(string $updateTime): void;

    /**
     * @return string
     */
    public function getMetaTitle(): string;

    /**
     * @param string $metaTitle
     * @return mixed
     */
    public function setMetaTitle(string $metaTitle);

    /**
     * @return string
     */
    public function getFeaturedImage(): string;

    /**
     * @param string $featuredImage
     * @return mixed
     */
    public function setFeaturedImage(string $featuredImage);

}
