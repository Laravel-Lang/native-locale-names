<?php

declare(strict_types=1);

namespace LaravelLang\NativeLocaleNames\Helpers;

class Path
{
    public static function resolve(string $locale): string|bool
    {
        return realpath(__DIR__ . '/../../locales/' . $locale . '/php.json');
    }
}
