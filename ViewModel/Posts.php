<?php

declare(strict_types=1);

namespace MageMastery\Blog\ViewModel;

use MageMastery\Blog\Model\ResourceModel\Post\Collection;
use MageMastery\Blog\Model\Post;
use MageMastery\Blog\Service\PostsProvider;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\Template;
use Magento\Theme\Block\Html\Pager;


class Posts implements ArgumentInterface
{

    /**
     * @param PostsProvider $postsProvider
     * @param RequestInterface $request
     */
    public function __construct(
        private PostsProvider    $postsProvider,
        private RequestInterface $request
    )
    {
    }

    /**
     * @param int $limit
     * @return Collection
     */
    public function getPosts(int $limit): Collection
    {
        return $this->postsProvider->getPosts($limit, $this->getCurrentPage());
    }

    /**
     * @return int
     */
    private function getCurrentPage(): int
    {
        return (int) $this->request->getParam('p');
    }

    /**
     * @param Collection $collection
     * @param Pager $pagerBlock
     * @return string
     */
    public function getPager(Collection $collection, Pager $pagerBlock): string
    {
        $pagerBlock->setUseContainer(false)
            ->setShowPerPage(false)
            ->setShowAmounts(false)
            ->setFrameLength(3)
            ->setLimit($collection->getPageSize())
            ->setCollection($collection);

        return $pagerBlock->toHtml();
    }

    /**
     * @param Template $block
     * @param Post $post
     * @return string
     */
    public function getPostHtml(Template $block, Post $post): string
    {
        $block->setData('post', $post);
        return $block->toHtml();
    }
}
