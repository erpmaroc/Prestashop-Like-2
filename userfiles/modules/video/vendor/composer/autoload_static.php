<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79734653461af9761e26a1b046cc939f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'depexor\\Modules\\Video\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'depexor\\Modules\\Video\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79734653461af9761e26a1b046cc939f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79734653461af9761e26a1b046cc939f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
