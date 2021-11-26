<?php

namespace depexorPackages\Multilanguage;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Illuminate\Support\Facades\Event;
use depexorPackages\Admin\MailTemplates\Models\MailTemplate;
use depexorPackages\Category\Events\CategoryWasCreated;
use depexorPackages\Category\Events\CategoryWasUpdated;
use depexorPackages\Category\Models\Category;
use depexorPackages\Content\Content;
use depexorPackages\Content\Events\ContentWasCreated;
use depexorPackages\Content\Events\ContentWasUpdated;
use depexorPackages\CustomField\Models\CustomField;
use depexorPackages\CustomField\Models\CustomFieldValue;
use depexorPackages\Menu\Events\MenuWasCreated;
use depexorPackages\Menu\Events\MenuWasUpdated;
use depexorPackages\Menu\Menu;
use depexorPackages\Multilanguage\Listeners\MultilanguageEventListener;
use depexorPackages\Multilanguage\Observers\MultilanguageObserver;
use depexorPackages\Option\Models\ModuleOption;
use depexorPackages\Page\Events\PageWasCreated;
use depexorPackages\Page\Events\PageWasUpdated;
use depexorPackages\Page\Models\Page;
use depexorPackages\Post\Events\PostWasCreated;
use depexorPackages\Post\Events\PostWasUpdated;
use depexorPackages\Post\Models\Post;
use depexorPackages\Product\Events\ProductWasCreated;
use depexorPackages\Product\Events\ProductWasUpdated;
use depexorPackages\Product\Models\Product;


class MultilanguageEventServiceProvider extends EventServiceProvider
{

    public function boot()
    {
        parent::boot();
/*
        Content::observe(MultilanguageObserver::class);
        Category::observe(MultilanguageObserver::class);
        Post::observe(MultilanguageObserver::class);
        Menu::observe(MultilanguageObserver::class);
        Product::observe(MultilanguageObserver::class);
        Page::observe(MultilanguageObserver::class);
        ModuleOption::observe(MultilanguageObserver::class);
        MailTemplate::observe(MultilanguageObserver::class);
        CustomField::observe(MultilanguageObserver::class);
        CustomFieldValue::observe(MultilanguageObserver::class);*/
/*
        // Created
        Event::listen(
            ContentWasCreated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            PostWasCreated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            PageWasCreated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            ProductWasCreated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            CategoryWasCreated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            MenuWasCreated::class,
            [MultilanguageEventListener::class, 'handle']
        );

        // Updated
        Event::listen(
            ContentWasUpdated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            PostWasUpdated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            PageWasUpdated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            ProductWasUpdated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            CategoryWasUpdated::class,
            [MultilanguageEventListener::class, 'handle']
        );
        Event::listen(
            MenuWasUpdated::class,
            [MultilanguageEventListener::class, 'handle']
        );*/
    }

}

