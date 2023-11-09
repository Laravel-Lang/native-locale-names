<?php

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Native;

it('checks for a match against an null', function () {
    $source = sourceLocale(Locale::English->value);
    $native = Native::get(null);

    expect($native)->toBeNotEmpty()->toBe($source);
});
