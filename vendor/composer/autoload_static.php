<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaa950ade3acce4ea56b8fb8ab7b4dfae
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaa950ade3acce4ea56b8fb8ab7b4dfae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaa950ade3acce4ea56b8fb8ab7b4dfae::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
