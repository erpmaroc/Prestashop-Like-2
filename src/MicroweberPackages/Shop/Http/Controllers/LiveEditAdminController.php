<?php

namespace depexorPackages\Shop\Http\Controllers;

use Illuminate\Http\Request;
use depexorPackages\Blog\Http\Controllers\Traits\CustomFieldsRenderTrait;

class LiveEditAdminController
{
    use CustomFieldsRenderTrait;

    public function index(Request $request)
    {
        $moduleId = $request->get('id');

        $pages = \depexorPackages\Content\Content::where('content_type', 'page')
            //->where('subtype','dynamic')
             ->where('is_shop', 1)
            ->get();

        $getCustomFieldsTableRoute = route('admin.shop.filter.get-custom-fields-table');

        return view('shop::admin.live_edit', [
            'moduleId'=>$moduleId,
            'pages'=>$pages,
            'getCustomFieldsTableRoute'=>$getCustomFieldsTableRoute,
        ]);
    }

    public function getCustomFieldsTableFromPage(Request $request)
    {
        $contentFromId = $request->get('contentFromId', false);
        $moduleId = $request->get('moduleId');

        $customFieldNames = $this->getCustomFieldByParentIdAndModuleId($contentFromId, $moduleId);

        return view('shop::admin.ajax_custom_fields_table', [
            'moduleId'=>$moduleId,
            'customFieldNames'=>$customFieldNames
        ]);
    }
}
