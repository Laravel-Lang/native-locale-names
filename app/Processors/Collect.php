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

use DragonCode\Support\Facades\Helpers\Str;
use LaravelLang\Dev\Integrations\Cldr as CldrIntegration;
use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\LocaleNames;
use Symfony\Component\Console\Output\OutputInterface;

class Collect extends Processor
{
    protected array $collection = [];

    public function __construct(
        OutputInterface $output,
        protected CldrIntegration $cldr = new CldrIntegration()
    ) {
        parent::__construct($output);
    }

    public function handle(): void
    {
        $this->output->writeln('Collecting locales...');
        $this->collectLocales();

        $this->output->writeln('Store locales...');
        $this->storeLocales();
    }

    protected function collectLocales(): void
    {
        foreach ($this->locales() as $first) {
            $this->collection[$first]['tl'] = 'Tagalog';

            foreach ($this->locales() as $second) {
                $name = $this->find($second, $first);

                $this->collection[$first][$second] = Str::title($name);

                if ($first === $second) {
                    $this->collection[LocaleNames::$default][$first] = Str::title($name);
                }
            }
        }
    }

    protected function storeLocales(): void
    {
        foreach ($this->collection as $locale => $values) {
            $this->store($locale, $values);
        }
    }

    protected function find(string $locale, string $forLocale): string
    {
        return $this->cldr->get($locale, $forLocale)
            ?? $this->cldr->get($locale, Locale::English->value);
    }
}
