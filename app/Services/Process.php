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

namespace LaravelLang\Dev\Services;

use RuntimeException;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process as SP;

class Process
{
    public static function run(OutputInterface $output, array $command): void
    {
        $process = new SP($command);
        $process->setTimeout(null);
        $process->setIdleTimeout(null);
        $process->start();

        foreach ($process as $type => $data) {
            $process::OUT === $type
                ? $output->writeln($data)
                : $output->writeln('Error: ' . $data);
        }

        if (! $process->isSuccessful()) {
            throw new RuntimeException(sprintf(
                'The command "%s" failed with exit code %d',
                $process->getCommandLine(),
                $process->getExitCode()
            ));
        }
    }
}
