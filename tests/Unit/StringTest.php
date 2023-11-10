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

use LaravelLang\NativeLocaleNames\Native;

it('checks for a match using the locale string value', function (string $locale) {
    expect(Native::get($locale))->toBeNotEmpty()->toBeSameCount()->toBeLocale($locale);
})->with('locales-string');
