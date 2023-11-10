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

namespace LaravelLang\Dev\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Command extends BaseCommand
{
    protected string $info;

    protected string $processor;

    protected function configure(): BaseCommand
    {
        return $this
            ->setName($this->classname())
            ->setDescription($this->info);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        (new $this->processor($output))->handle();

        return static::SUCCESS;
    }

    protected function classname(): string
    {
        return Str::of(static::class)->classBasename()->lower()->trim()->toString();
    }
}
