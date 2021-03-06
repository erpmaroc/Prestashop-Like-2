<?php
namespace depexorPackages\Shop\FrontendFilter;

use depexorPackages\Blog\FrontendFilter\BaseFilter;
use depexorPackages\Blog\FrontendFilter\Traits\CustomFieldsTrait;
use depexorPackages\Page\Models\Page;
use depexorPackages\Shop\FrontendFilter\Traits\PriceFilter;

class ShopFilter extends BaseFilter {

    use PriceFilter, CustomFieldsTrait;

    // public $viewNamespace = 'shop';

    public function getMainPageId()
    {
        $contentFromId = get_option('content_from_id', $this->params['moduleId']);
        if ($contentFromId) {
            return $contentFromId;
        }

        $findFirtShop = Page::where('content_type', 'page')
            ->where('subtype','dynamic')
            ->where('is_shop', 1)
            ->first();

        if ($findFirtShop) {
            return $findFirtShop->id;
        }

        return 0;
    }
}
