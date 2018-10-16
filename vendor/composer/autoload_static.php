<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3b78bbd226f4ad010e53b12394f5db32
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Includes\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Includes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3b78bbd226f4ad010e53b12394f5db32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3b78bbd226f4ad010e53b12394f5db32::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}