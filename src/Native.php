<?php

declare(strict_types=1);

namespace LaravelLang\NativeLocaleNames;

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Enums\SortBy;
use LaravelLang\NativeLocaleNames\Helpers\Arr;
use LaravelLang\NativeLocaleNames\Helpers\Path;

class Native
{
    public static function get(Locale|string|null $locale = null, SortBy $sortBy = SortBy::Value): array
    {
        if ($locale = static::locale($locale)) {
            return static::forLocale($locale, $sortBy);
        }

        return static::forLocale('_combined', $sortBy);
    }

    protected static function forLocale(string $locale, SortBy $sortBy): array
    {
        return Arr::sortBy(static::load(static::path($locale)), $sortBy);
    }

    protected static function load(string $path): array
    {
        return Arr::file($path);
    }

    protected static function path(string $locale): bool|string
    {
        return Path::resolve($locale) ?: Path::resolve('_combined');
    }

    protected static function locale(Locale|string|null $locale): ?string
    {
        if (empty($locale)) {
            return null;
        }

        return $locale->value ?? Locale::tryFrom($locale)?->value;
    }
}
