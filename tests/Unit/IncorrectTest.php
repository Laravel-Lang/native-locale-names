<?php

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Native;

it('checks for a match using the locale string value', function (string $locale) {
    $source = sourceLocale(Locale::English->value);
    $native = Native::get($locale);

    expect($native)->toBeNotEmpty()->toBe($source);
})->with('locales-incorrect');
