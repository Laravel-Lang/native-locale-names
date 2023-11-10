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

namespace LaravelLang\Dev\Services;

use DragonCode\Support\Facades\Filesystem\File;
use LaravelLang\NativeLocaleNames\Helpers\Arr;

class Filesystem
{
    public static function read(string $path): array
    {
        return Arr::file($path);
    }

    public static function store(string $path, array $content): void
    {
        File::store(
            $path,
            json_encode($content, JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES ^ JSON_PRETTY_PRINT) . PHP_EOL
        );
    }
}
