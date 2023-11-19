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

use LaravelLang\Dev\Services\Filesystem;
use LaravelLang\LocaleList\Locale;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Processor
{
    protected string $sourceFile = __DIR__ . '/../../source/locales.json';

    protected ?array $available = null;

    abstract public function handle(): void;

    public function __construct(
        protected readonly OutputInterface $output
    ) {}

    protected function load(string $path): array
    {
        return Filesystem::read($path);
    }

    protected function store(string $path, array $values): void
    {
        ksort($values);

        Filesystem::store($path, $values);
    }

    protected function locales(): array
    {
        return $this->available ??= Locale::values();
    }
}
