<?php

namespace depexorPackages\Content\tests;

use depexorPackages\Core\tests\TestCase;
use depexorPackages\Translation\TranslationPackageInstallHelper;

class LangTest extends TestCase
{

    public function testLang()
    {

        $lang_string_test1 = _e('Product', true);
        $this->assertEquals('Product', $lang_string_test1);

//        \DB::table('translation_texts')->where('translation_locale','bg_BG')->delete();
//
//        $install_lang = TranslationPackageInstallHelper::installLanguage('bg_BG');
 //       $this->assertArrayHasKey('success', $install_lang);
        set_current_lang('en_US');
        $current_lang = current_lang();
        $this->assertEquals('en_US', $current_lang);

        set_current_lang('bg_BG');
        $new_current_lang = current_lang();
        $this->assertEquals('bg_BG', $new_current_lang);

        $lang_string_test = _e('Product', true);
        $this->assertEquals('Продукт', $lang_string_test);
    }

    public function testLangData()
    {

        $loc_en = \depexorPackages\Translation\LanguageHelper::getLangData('en');
        $loc_en2 = \depexorPackages\Translation\LanguageHelper::getLangData('en_US');


        $loc_bg = \depexorPackages\Translation\LanguageHelper::getLangData('bg');
        $loc_bg2 = \depexorPackages\Translation\LanguageHelper::getLangData('bg_BG');


        $loc_cs = \depexorPackages\Translation\LanguageHelper::getLangData('cs');
        $loc_cs2 = \depexorPackages\Translation\LanguageHelper::getLangData('cs_CZ');

        $this->assertEquals($loc_en, $loc_en2);
        $this->assertEquals($loc_bg, $loc_bg2);
        $this->assertEquals($loc_cs, $loc_cs2);

    }
}
