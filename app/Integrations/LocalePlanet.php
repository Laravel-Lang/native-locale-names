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

use Exception;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Throwable;

class LocalePlanet
{
    protected string $uri = 'https://www.localeplanet.com/icu/%s/index.html?locale=%s';

    protected int $tries = 5;

    protected int $timeout = 500;

    public function __construct(
        protected Client $client = new Client(),
    ) {}

    public function get(string $locale, string $forLocale): ?string
    {
        try {
            return $this->parse(
                $this->request(sprintf($this->uri, $locale, $forLocale))
            );
        }
        catch (Throwable) {
            return null;
        }
    }

    protected function request(string $uri): string
    {
        return retry($this->tries, function () use ($uri) {
            $response = $this->client->get($uri);

            if ($response->getStatusCode() >= 400) {
                throw new Exception();
            }

            return $response->getBody()->getContents();
        }, $this->timeout);
    }

    protected function parse(string $html): ?string
    {
        return $this->crawler($html)
            ->filter('table > tr:nth-child(5) > td:nth-child(2)')
            ->text('') ?: null;
    }

    protected function crawler(string $html): Crawler
    {
        return new Crawler($html);
    }
}
