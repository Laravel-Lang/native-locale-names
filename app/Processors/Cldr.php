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
        'tl',
        'zh_CN',
        'zh_HK',
        'zh_TW',
    ];

    public function handle(): void
    {
        Process::run($this->output, ['php', 'vendor/bin/punic-data', '-l', $this->toInstall()]);
    }

    protected function toInstall(): string
    {
        return collect(parent::locales())
            ->filter(fn (string $locale) => ! in_array($locale, $this->notSupported, true))
            ->map(fn (string $locale) => [
                $locale,
                Str::before($locale, '_'),
            ])
            ->flatten()
            ->unique()
            ->sort()
            ->map(fn (string $locale) => '+' . $locale)
            ->implode(',');
    }
}
