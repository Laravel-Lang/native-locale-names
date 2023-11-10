<?php

declare(strict_types=1);

use LaravelLang\NativeLocaleNames\Helpers\Arr;

function sourceLocale(string $locale): array
{
    return Arr::file(__DIR__ . '/../../locales/' . $locale . '/php.json');
}
