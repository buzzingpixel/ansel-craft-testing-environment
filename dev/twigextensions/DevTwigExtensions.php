<?php

namespace dev\twigextensions;

use dev\services\ConfigService;
use dev\services\StorageService;
use dev\services\FileOperationsService;

/**
 * Class GetEnvTwigExtension
 *
 * @package dev\twigextensions
 */
class DevTwigExtensions extends \Twig_Extension
{
    /**
     * Returns the twig functions
     * @return \Twig_Function[]
     */
    public function getFunctions() : array
    {
        return [
            new \Twig_Function('fileTime', [
                new FileOperationsService(),
                'getFileTime',
            ]),
            new \Twig_Function('customConfig', [
                new ConfigService(),
                'getCustomConfig',
            ]),
            new \Twig_Function('uniqueId', function () {
                return uniqid('', false);
            }),
            new \Twig_Function('getStorage', function ($key, $namespace = 'storage') {
                return StorageService::getInstance()->get($key, $namespace);
            }),
        ];
    }
}
