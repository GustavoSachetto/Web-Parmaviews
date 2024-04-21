<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf87b14f0baae49a90a4ebbc41e6a5077
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf87b14f0baae49a90a4ebbc41e6a5077::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf87b14f0baae49a90a4ebbc41e6a5077::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf87b14f0baae49a90a4ebbc41e6a5077::$classMap;

        }, null, ClassLoader::class);
    }
}
