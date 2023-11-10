<?php

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;

dataset('locales-string', fn () => Locale::values());
dataset('locales-enum', fn () => Locale::cases());
dataset('locales-incorrect', ['foo', 'bar', 'baz']);
dataset('locales-empty', ['', null]);
