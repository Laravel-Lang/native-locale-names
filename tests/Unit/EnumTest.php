<?php

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Native;

it('checks if the enum matches the locale value', function (Locale $locale) {
    $source = sourceLocale($locale->value);
    $native = Native::get($locale);

    expect($native)->toBeNotEmpty()->toBe($source);
})->with('locales-enum');
