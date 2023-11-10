<?php

declare(strict_types=1);

namespace LaravelLang\NativeLocaleNames;

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Enums\SortBy;
use LaravelLang\NativeLocaleNames\Helpers\Arr;

class Native
{
    public static function get(Locale|string|null $locale = null, SortBy $sortBy = SortBy::Value): array
    {
        return Arr::sortBy(
            static::forLocale($locale) ?: static::perLocale(),
            $sortBy
        );
    }

    protected static function perLocale(): array
    {
        $result = [];

        foreach (Locale::values() as $locale) {
            $result[$locale] = static::load(static::path($locale))[$locale];
        }

        return $result;
    }

    protected static function forLocale(Locale|string|null $locale): array
    {
        if ($path = static::path($locale)) {
            return static::load($path);
        }

        return [];
    }

    protected static function load(string $path): array
    {
        return Arr::file($path);
    }

    protected static function path(Locale|string|null $locale = null): bool|string
    {
        if ($locale = static::locale($locale)) {
            return realpath(__DIR__ . '/../locales/' . $locale . '/php.json');
        }

        return false;
    }

    protected static function locale(Locale|string|null $locale): ?string
    {
        return $locale->value ?? $locale;
    }
}
