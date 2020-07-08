<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48c2c3992e7ff4eda4eacb9b069899fe
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit48c2c3992e7ff4eda4eacb9b069899fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48c2c3992e7ff4eda4eacb9b069899fe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}