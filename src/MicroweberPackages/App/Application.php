<?php

namespace depexorPackages;

use depexorPackages\App\Managers\CacheManager;
use depexorPackages\App\Managers\ConfigurationManager;
use depexorPackages\App\Managers\Helpers\Lang;
use depexorPackages\App\Managers\LogManager;
use depexorPackages\App\Managers\NotificationsManager;
use depexorPackages\App\Managers\PermalinkManager;
use depexorPackages\App\Managers\Ui;
use depexorPackages\Cart\Repositories\CartRepository;
use depexorPackages\Category\Repositories\CategoryRepository;
use depexorPackages\Content\Repositories\ContentRepository;
use depexorPackages\CustomField\Repositories\CustomFieldRepository;
use depexorPackages\Media\Repositories\MediaRepository;
use depexorPackages\Menu\Repositories\MenuRepository;
use depexorPackages\Module\Repositories\ModuleRepository;
use depexorPackages\Multilanguage\Repositories\MultilanguageRepository;
use depexorPackages\Offer\Repositories\OfferRepository;
use depexorPackages\Option\Repositories\OptionRepository;
use depexorPackages\Repository\RepositoryManager;
use depexorPackages\Shipping\ShippingManager;
use depexorPackages\Translation\Translator;
use depexorPackages\User\UserManager;
use depexorPackages\Utils\Captcha\CaptchaManager;
use depexorPackages\Cart\CartManager;
use depexorPackages\Category\CategoryManager;
use depexorPackages\Checkout\CheckoutManager;
use depexorPackages\Content\AttributesManager;
use depexorPackages\Content\ContentManager;
use depexorPackages\Content\DataFieldsManager;
use depexorPackages\Database\DatabaseManager;
use depexorPackages\Event\Event;
use depexorPackages\CustomField\FieldsManager;
use depexorPackages\Form\FormsManager;
use depexorPackages\Helper\Format;
use depexorPackages\Helper\UrlManager;
use depexorPackages\Media\MediaManager;
use depexorPackages\Menu\MenuManager;
use depexorPackages\Module\ModuleManager;
use depexorPackages\Option\OptionManager;
use depexorPackages\Order\OrderManager;
use depexorPackages\Shop\ShopManager;
use depexorPackages\Tag\TagsManager;
use depexorPackages\Tax\TaxManager;
use depexorPackages\Template\LayoutsManager;
use depexorPackages\Template\Template;
use depexorPackages\Template\TemplateManager;
use depexorPackages\Utils\Http\Http;

/**
 * Application class.
 *
 * Class that loads other classes
 *
 * @category Application
 * @desc
 *
 * @property UrlManager                    $url_manager
 * @property Format                            $format
 * @property ContentManager                $content_manager
 * @property RepositoryManager                $repository_manager
 * @property ContentRepository                $content_repository
 * @property CategoryManager               $category_manager
 * @property CategoryRepository              $category_repository
 * @property MenuManager                   $menu_manager
 * @property MenuRepository              $menu_repository
 * @property MediaManager                  $media_manager
 * @property MediaRepository                  $media_repository
 * @property ShopManager                   $shop_manager
 * @property CartManager              $cart_manager
 * @property CartRepository         $cart_repository
 * @property OrderManager             $order_manager
 * @property CustomFieldRepository $custom_field_repository
 * @property OfferRepository             $offer_repository
 * @property TaxManager               $tax_manager
 * @property CheckoutManager          $checkout_manager
 * @property ShippingManager          $shipping_manager
 * @property OptionManager                 $option_manager
 * @property OptionRepository                 $option_repository
 * @property CacheManager                  $cache_manager
 * @property UserManager                   $user_manager
 * @property DatabaseManager              $database_manager
 * @property NotificationsManager          $notifications_manager
 * @property LayoutsManager                $layouts_manager
 * @property LogManager                    $log_manager
 * @property FieldsManager                 $fields_manager
 * @property Template                      $template
 * @property Event                         $event_manager
 * @property ConfigurationManager          $config_manager
 * @property TemplateManager               $template_manager
 * @property CaptchaManager               $captcha_manager
 * @property Ui                            $ui
 * @property Http                              $http
 * @property FormsManager                  $forms_manager
 * @property DataFieldsManager     $data_fields_manager
 * @property TagsManager           $tags_manager
 * @property AttributesManager     $attributes_manager
 * @property Lang                  $lang_helper
 * @property PermalinkManager              $permalink_manager
 * @property ModuleManager              $module_manager
 * @property ModuleRepository              $module_repository
 * @property Translator                    $translator
 * @property MultilanguageRepository       $multilanguage_repository
 */
class Application
{
    public static $instance;

    public function __construct($params = null)
    {
        $instance = app();
        self::$instance = $instance;

        return self::$instance;
    }

    public static function getInstance($params = null)
    {
        if (self::$instance == null) {
            self::$instance = app();
        }

        return self::$instance;
    }

    public function make($property)
    {
        return app()->make($property);
    }

    public function __get($property)
    {
        return $this->make($property);
    }
}
