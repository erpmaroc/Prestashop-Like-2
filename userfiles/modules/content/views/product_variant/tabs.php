<?php
$productVariant = [];
$productVariant['id'] = 0;
$productVariantPrice = 0;
$contentData = \depexorPackages\Product\Models\ProductVariant::$contentDataDefault;
$customFields = \depexorPackages\Product\Models\ProductVariant::$customFields;

if ($data['id'] > 0) {
    $productVariant = \depexorPackages\Product\Models\ProductVariant::where('id',$data['id'])->first();
    $contentData = $productVariant->getContentData();
    $productVariantPrice = $productVariant->price;
}
?>
