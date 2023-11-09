<?php

declare(strict_types=1);

use DragonCode\Support\Facades\Helpers\Arr;

function sourceLocale(string $locale): array
{
    return Arr::ofFile(__DIR__ . '/../../locales/' . $locale . '/php.json')->toArray();
}
