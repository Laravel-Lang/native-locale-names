<?php

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Enums\SortBy;
use LaravelLang\NativeLocaleNames\Helpers\Arr;
use PHPUnit\Framework\Assert;

expect()->extend('toBeNotEmpty', function () {
    Assert::assertNotEmpty($this->value);

    return $this;
});

expect()->extend('toBeSameCount', function () {
    Assert::assertCount(count(Locale::values()), $this->value);

    return $this;
});

expect()->extend('toBeLocale', function (Locale|string $locale, SortBy $sortBy = SortBy::Value) {
    $values = Arr::sortBy(sourceLocale($locale->value ?? $locale), $sortBy);

    return $this->toBe($values);
});

expect()->extend('toBeCompileLocales', function (SortBy $sortBy = SortBy::Value) {
    $result = [];

    foreach (Locale::values() as $value) {
        $result[$value] = sourceLocale($value)[$value];
    }

    $this->toBe(Arr::sortBy($result, $sortBy));

    return $this;
}
);
