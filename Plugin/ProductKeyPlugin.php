<?php

namespace HimaMage\PluginExample\Plugin;

use HimaMage\PluginExample\Model\ProductKey;
use Magento\Catalog\Api\Data\ProductInterface;

class ProductKeyPlugin
{
//    public function beforeGetKey(ProductKey $subject , ProductInterface $product , string $prefix)
//    {
//        $prefix = "this is the prefix from before plugin";
//        return [$product , $prefix];
//    }
//    public function afterGetKey(ProductKey $subject ,$result, ProductInterface $product , string $prefix)
//    {
//        return $result . " this is comming from after plugin";
//    }

    public function aroundGetKey(ProductKey $subject ,callable $proceed, ProductInterface $product , string $prefix)
    {
         // before -> arguments
        $prefix = "This is modification using around plugin";
        // process the logic
        $result = $proceed($product , $prefix);
        // after the process maniplate result
        $result .= " this after i done process logix via around plugin";
        return $result;

    }
}
