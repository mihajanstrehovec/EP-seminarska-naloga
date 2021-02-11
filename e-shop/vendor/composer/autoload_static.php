<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit93f21a46bc16b83f4e05b8398f886959
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit93f21a46bc16b83f4e05b8398f886959::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit93f21a46bc16b83f4e05b8398f886959::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
