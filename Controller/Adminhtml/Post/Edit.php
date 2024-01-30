<?php

declare(strict_types=1);

namespace MageMastery\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;

class Edit extends Action implements HttpGetActionInterface
{
    /**
     * @return Page
     */
    public function execute(): Page
    {
        /** @var Page $pageResult */
        $pageResult = $this->createPageResult();
        $title = $pageResult->getConfig()->getTitle();
        $title->prepend(__('Posts'));
        $title->prepend(__('New Post'));

        return $pageResult;
    }

    /**
     * @return ResultInterface|Page|(Page&ResultInterface)
     */
    private function createPageResult()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
