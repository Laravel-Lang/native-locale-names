<?php

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Native;

it('checks for a match using the locale string value', function (string $locale) {
    $source = sourceLocale($locale);
    $native = Native::get($locale);

    expect($native)->toBeNotEmpty()->toBe($source);
})->with('locales-string');

it('checks for a match against an empty string', function () {
    $source = sourceLocale(Locale::English->value);
    $native = Native::get('');

    expect($native)->toBeNotEmpty()->toBe($source);
});
