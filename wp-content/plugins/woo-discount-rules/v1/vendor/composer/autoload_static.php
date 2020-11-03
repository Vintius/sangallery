<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit99fb821a098de3bdad03e3323415706b
{
    public static $files = array (
        '89ff252b349d4d088742a09c25f5dd74' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/plugin-update-checker.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FlycartInput\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FlycartInput\\' => 
        array (
            0 => __DIR__ . '/..' . '/flycartinc/inputhelper/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit99fb821a098de3bdad03e3323415706b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit99fb821a098de3bdad03e3323415706b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
