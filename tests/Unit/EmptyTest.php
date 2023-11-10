<?php

declare(strict_types=1);

use LaravelLang\NativeLocaleNames\Native;

it('checks for empty values being passed')
    ->with('locales-empty')
    ->expect(fn (?string $locale) => Native::get($locale))
    ->toBeNotEmpty()
    ->toBeSameCount()
    ->toBeCompileLocales();
