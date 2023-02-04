<?php

namespace HimaMage\PluginExample\ViewModel;

use HimaMage\PluginExample\Model\ProductKey;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Example implements  ArgumentInterface
{
    private ProductRepositoryInterface $productRepository;
    private ProductKey $productKey;

    public function __construct(ProductRepositoryInterface $productRepository , ProductKey $productKey)
    {
        $this->productRepository = $productRepository;
        $this->productKey = $productKey;
    }

    public function getProductKey(RequestInterface $request) : ?string
    {
        $productId = $request->getParam("product_id");
        if(null != $productId ) {
            $product = $this->productRepository->getById($productId);
            return $this->productKey->getKey($product , "Product Prefix");
        }
    }
}
