<?php

/**
 * This file is part of the "laravel-lang/native-locale-names" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\NativeLocaleNames\Enums\SortBy;
use LaravelLang\NativeLocaleNames\Helpers\Arr;
use PHPUnit\Framework\Assert;

expect()->extend('toBeSameCount', function () {
    Assert::assertCount(count(Locale::values()), $this->value);

    return $this;
});

expect()->extend('toBeLocale', function (string|Locale $locale, SortBy $sortBy = SortBy::Value) {
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
