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

use LaravelLang\NativeLocaleNames\Native;

class Collect extends Processor
{
    protected string $targetFile = __DIR__ . '/../../locales/_native/json.json';

    public function handle(): void
    {
        $this->output->writeln('Collecting locales...');
        $collection = $this->compile();

        $this->output->writeln('Store to file...');
        $this->store($this->targetFile, $collection);
    }

    protected function compile(): array
    {
        $result = [];

        foreach ($this->locales() as $locale) {
            $result[$locale] = Native::get($locale)[$locale];
        }

        return $result;
    }
}
