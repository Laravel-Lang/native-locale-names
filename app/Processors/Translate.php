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
use LaravelLang\Dev\Integrations\LocalePlanet;
use Symfony\Component\Console\Output\OutputInterface;

class Translate extends Processor
{
    protected string $localeFile = __DIR__ . '/../../locales/%s/json.json';

    public function __construct(
        OutputInterface $output,
        protected LocalePlanet $planet = new LocalePlanet()
    ) {
        parent::__construct($output);
    }

    public function handle(): void
    {
        $this->output->writeln('Translating the source file...');
        $this->translateSource();

        $this->output->writeln('Translating locales...');
        $this->translateLocales($this->locales());
    }

    protected function translateSource(): void
    {
        $this->process($this->locales(), $this->sourceFile, 'en');
    }

    protected function translateLocales(array $locales): void
    {
        foreach ($locales as $locale) {
            $this->output->writeln('    ' . $locale . '...');

            $this->process($locales, $this->localeFile($locale), $locale);
        }
    }

    protected function process(array $available, string $path, string $locale): void
    {
        $values = $this->load($path);

        foreach ($available as $key) {
            if ($name = $this->planet->get($key, $locale)) {
                $values[$key] = Str::title($name);
            }
        }

        $this->store($path, $values);
    }

    protected function localeFile(string $locale): string
    {
        return sprintf($this->localeFile, $locale);
    }
}
