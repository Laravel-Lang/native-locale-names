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

namespace LaravelLang\Dev\Integrations;

use Punic\Language;

class Cldr extends Integration
{
    public function get(string $locale, string $forLocale): ?string
    {
        $result = $this->find($locale, $forLocale);

        return $result === $locale ? null : $result;
    }

    protected function find(string $locale, string $forLocale): string
    {
        return Language::getName($locale, $forLocale);
    }
}
