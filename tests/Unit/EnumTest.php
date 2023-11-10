<?php

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Native;

it('checks if the enum matches the locale value', function (Locale $locale) {
    expect(Native::get($locale))->toBeNotEmpty()->toBeSameCount()->toBeLocale($locale);
})->with('locales-enum');
