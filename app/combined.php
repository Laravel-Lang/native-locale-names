<?php

declare(strict_types=1);

use DragonCode\Support\Facades\Filesystem\File;
use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Helpers\Arr;
use LaravelLang\NativeLocaleNames\Native;

require_once __DIR__ . '/../vendor/autoload.php';

$result = [];

foreach (Locale::values() as $locale) {
    $result[$locale] = Native::get($locale)[$locale];
}

File::store(
    __DIR__ . '/../locales/_combined/php.json',
    json_encode(Arr::ksort($result), JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES ^ JSON_PRETTY_PRINT)
);
