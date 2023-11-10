<?php

declare(strict_types=1);

use LaravelLang\NativeLocaleNames\Native;

it('checks for a match using the locale string value', function (string $locale) {
    expect(Native::get($locale))->toBeNotEmpty()->toBeSameCount()->toBeLocale($locale);
})->with('locales-string');
