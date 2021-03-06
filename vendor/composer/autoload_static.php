<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd0295a994dc6f071a057d6c1f460f96
{
    public static $files = array (
        '41da55927f7e15e2e05566a733ef4ad4' => __DIR__ . '/../..' . '/functions.php',
    );

    public static $classMap = array (
        'Admin' => __DIR__ . '/../..' . '/app/models/Admin.php',
        'AuthController' => __DIR__ . '/../..' . '/app/controllers/AuthController.php',
        'ErrorController' => __DIR__ . '/../..' . '/app/controllers/ErrorController.php',
        'Job' => __DIR__ . '/../..' . '/app/models/Job.php',
        'JobController' => __DIR__ . '/../..' . '/app/controllers/JobController.php',
        'Router' => __DIR__ . '/../..' . '/router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitbd0295a994dc6f071a057d6c1f460f96::$classMap;

        }, null, ClassLoader::class);
    }
}
