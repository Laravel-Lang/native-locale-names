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

use DragonCode\Support\Facades\Filesystem\File;
use LaravelLang\NativeLocaleNames\Helpers\Arr;
use LaravelLang\NativeLocaleNames\Native;

require_once __DIR__ . '/../vendor/autoload.php';

$result = [];

$locales = Arr::file(__DIR__ . '/../source/locales.json');

foreach (array_keys($locales) as $locale) {
    $result[$locale] = Native::get($locale)[$locale];
}

File::store(
    __DIR__ . '/../locales/_combined/json.json',
    json_encode(Arr::ksort($result), JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES ^ JSON_PRETTY_PRINT)
);
