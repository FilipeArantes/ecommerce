<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfa4de5405713755eeb85efc9487cdd0b
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'library\\crud\\' => 13,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'R' => 
        array (
            'Routes\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Clock\\' => 10,
            'PhpOption\\' => 10,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
            'Lcobucci\\JWT\\' => 13,
        ),
        'I' => 
        array (
            'Ipeweb\\MeuProjeto\\' => 18,
        ),
        'G' => 
        array (
            'GrahamCampbell\\ResultType\\' => 26,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'C' => 
        array (
            'Core\\Router\\' => 12,
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'library\\crud\\' => 
        array (
            0 => __DIR__ . '/../..' . '/library',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Routes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routes',
        ),
        'Psr\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/clock/src',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Lcobucci\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/jwt/src',
        ),
        'Ipeweb\\MeuProjeto\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'GrahamCampbell\\ResultType\\' => 
        array (
            0 => __DIR__ . '/..' . '/graham-campbell/result-type/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Core\\Router\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/router',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfa4de5405713755eeb85efc9487cdd0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfa4de5405713755eeb85efc9487cdd0b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfa4de5405713755eeb85efc9487cdd0b::$classMap;

        }, null, ClassLoader::class);
    }
}
