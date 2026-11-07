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

use LaravelLang\NativeLocaleNames\Services\Filesystem;

beforeEach(function () {
    $this->directory = sys_get_temp_dir() . '/native-locale-names-' . uniqid();
});

afterEach(function () {
    $path = $this->directory . '/nested/foo.json';

    is_file($path) && unlink($path);
    is_dir($this->directory . '/nested') && rmdir($this->directory . '/nested');
    is_dir($this->directory) && rmdir($this->directory);
});

it('returns an empty array when the file or path is not a file', function () {
    expect(Filesystem::load($this->directory . '/missing.json'))->toBe([])
        ->and(Filesystem::load(__DIR__))->toBe([]);
});

it('creates missing directories and stores pretty JSON with a trailing newline', function () {
    $path = $this->directory . '/nested/foo.json';

    Filesystem::store($path, ['a' => 'Español', 'b' => 'a/b']);

    expect(file_get_contents($path))->toBe("{\n    \"a\": \"Español\",\n    \"b\": \"a/b\"\n}\n")
        ->and(Filesystem::load($path))->toBe(['a' => 'Español', 'b' => 'a/b']);
});

it('throws on invalid JSON', function () {
    $path = $this->directory . '/nested/foo.json';

    mkdir(dirname($path), 0o755, true);
    file_put_contents($path, '{broken');

    Filesystem::load($path);
})->throws(JsonException::class);
