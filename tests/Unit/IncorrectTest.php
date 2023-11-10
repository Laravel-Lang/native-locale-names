<?php

declare(strict_types=1);

use LaravelLang\NativeLocaleNames\Native;

it('checks for a match using the locale string value')
    ->with('locales-incorrect')
    ->expect(fn (string $locale) => Native::get($locale))
    ->toBeNotEmpty()
    ->toBeSameCount()
    ->toBeCompileLocales();
