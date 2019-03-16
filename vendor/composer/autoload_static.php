<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3650fe2bd6d96ca1830a602811fb73d1
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3650fe2bd6d96ca1830a602811fb73d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3650fe2bd6d96ca1830a602811fb73d1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
