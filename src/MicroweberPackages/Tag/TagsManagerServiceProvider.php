<?php
/*
 * This file is part of the depexor framework.
 *
 * (c) depexor CMS LTD
 *
 * For full license information see
 * https://github.com/depexor/depexor/blob/master/LICENSE
 *
 */

namespace depexorPackages\Tag;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Multilanguage\TranslateTables\TranslateOption;
use depexorPackages\Tag\Model\Tag;
use depexorPackages\Tag\Model\Tagged;
use depexorPackages\Tag\Model\TagGroup;
use depexorPackages\Tag\TranslateTables\TranslateTaggingTagged;
use depexorPackages\Tag\TranslateTables\TranslateTaggingTags;

class TagsManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        \Config::set('tagging.tag_model', Tag::class);
        \Config::set('tagging.tagged_model', Tagged::class);
        \Config::set('tagging.tag_group_model', TagGroup::class);

        $this->app->translate_manager->addTranslateProvider(TranslateTaggingTags::class);
        $this->app->translate_manager->addTranslateProvider(TranslateTaggingTagged::class);

        /**
         * @property \depexorPackages\Tag\TagsManager    $tags_manager
         */
        $this->app->singleton('tags_manager', function ($app) {
            return new TagsManager();
        });
    }
}
