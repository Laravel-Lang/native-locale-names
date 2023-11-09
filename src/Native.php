<?php

declare(strict_types=1);

namespace LaravelLang\NativeLocaleNames;

use DragonCode\Support\Facades\Helpers\Arr;
use LaravelLang\Locales\Enums\Locale;

class Native
{
    protected static Locale $default = Locale::English;

    public static function get(Locale|string|null $locale): array
    {
        if ($path = static::path($locale)) {
            return static::load($path);
        }

        return static::load(static::path());
    }

    protected static function load(string $path): array
    {
        return Arr::ofFile($path)->toArray();
    }

    protected static function path(Locale|string|null $locale = null): bool|string
    {
        return realpath(__DIR__ . '/../locales/' . static::locale($locale) . '/php.json');
    }

    protected static function locale(Locale|string|null $locale): string
    {
        if (empty($locale)) {
            return Locale::English->value;
        }

        return $locale->value ?? $locale;
    }
}
