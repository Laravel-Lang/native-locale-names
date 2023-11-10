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

class LocalePlanet
{
    protected string $uri = 'https://www.localeplanet.com/api/%s/langmap.json';

    protected int $tries = 5;

    protected int $timeout = 1000;

    public function __construct(
        protected Client $client = new Client()
    ) {}

    public function get(string $locale): array
    {
        return $this->request(sprintf($this->uri, $locale));
    }

    protected function request(string $uri): array
    {
        return retry($this->tries, function () use ($uri) {
            $response = $this->client->get($uri);

            if ($response->getStatusCode() >= 400) {
                throw new Exception($response->getReasonPhrase());
            }

            return json_decode($response->getBody()->getContents(), true);
        }, $this->timeout);
    }
}
