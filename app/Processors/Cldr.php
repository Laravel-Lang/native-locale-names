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

namespace LaravelLang\Dev\Processors;

use Illuminate\Support\Str;
use LaravelLang\Dev\Services\Process;

class Cldr extends Processor
{
    protected array $notSupported = [
        'ak',
        'am',
        'as',
        'ay',
        'bho',
        'bm',
        'ceb',
        'ckb',
        'co',
        'de_CH',
        'doi',
        'dv',
        'ee',
        'eo',
        'fy',
        'ga',
        'gd',
        'gn',
        'gom',
        'ha',
        'haw',
        'hmn',
        'ht',
        'ig',
        'ilo',
        'jw',
        'kri',
        'ky',
        'la',
        'lb',
        'lg',
        'ln',
        'lo',
        'lus',
        'mai',
        'mg',
        'mi',
        'ml',
        'mni_Mtei',
        'mt',
        'my',
        'nso',
        'ny',
        'om',
        'or',
        'pa',
        'pt_BR',
        'qu',
        'rw',
        'sa',
        'sd',
        'sm',
        'sn',
        'so',
        'sr_Cyrl',
        'sr_Latn',
        'sr_Latn_ME',
        'st',
        'su',
        'ta',
        'te',
        'ti',
        'tl',
        'ts',
        'tt',
        'uz_Cyrl',
        'uz_Latn',
        'xh',
        'yi',
        'yo',
        'zh_CN',
        'zh_HK',
        'zh_TW',
        'zu',
    ];

    public function handle(): void
    {
        Process::run($this->output, ['php', 'vendor/bin/punic-data', '-l', $this->toInstall()]);
    }

    protected function toInstall(): string
    {
        return collect(parent::locales())
            ->map(fn (string $locale) => [
                $locale,
                Str::before($locale, '_'),
            ])
            ->flatten()
            ->unique()
            ->filter(fn (string $locale) => ! in_array($locale, $this->notSupported, true))
            ->sort()
            ->map(fn (string $locale) => '+' . $locale)
            ->implode(',');
    }
}
