<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit914368ad6213eacce229a68aec8a2cfb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit914368ad6213eacce229a68aec8a2cfb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit914368ad6213eacce229a68aec8a2cfb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit914368ad6213eacce229a68aec8a2cfb::$classMap;

        }, null, ClassLoader::class);
    }
}
