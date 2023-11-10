<?php

declare(strict_types=1);

namespace LaravelLang\NativeLocaleNames\Helpers;

use DragonCode\Support\Facades\Helpers\Arr as DragonArray;
use LaravelLang\NativeLocaleNames\Enums\SortBy;

class Arr
{
    public static function file(string $path): array
    {
        return DragonArray::ofFile($path)->toArray();
    }

    public static function sortBy($array, SortBy $sortBy): array
    {
        return $sortBy === SortBy::Key ? static::ksort($array) : static::sort($array);
    }

    public static function sort($array): array
    {
        $array = array_flip($array);

        ksort($array);

        return array_flip($array);
    }

    public static function ksort($array): array
    {
        ksort($array);

        return $array;
    }
}
