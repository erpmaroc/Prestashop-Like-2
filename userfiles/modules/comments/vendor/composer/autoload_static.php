<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c7f45618e1386af4abe726e6d0a8724
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'depexor\\Comments\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'depexor\\Comments\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1c7f45618e1386af4abe726e6d0a8724::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1c7f45618e1386af4abe726e6d0a8724::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
