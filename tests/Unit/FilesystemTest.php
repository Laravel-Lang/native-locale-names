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
    set_error_handler(static fn () => true, E_WARNING);

    $this->directory = sys_get_temp_dir() . '/native-locale-names-' . uniqid();
});

afterEach(function () {
    $entries = [
        $this->directory . '/nested/foo.json/bar.json',
        $this->directory . '/nested/foo.json',
        $this->directory . '/nested',
        $this->directory,
    ];

    foreach ($entries as $entry) {
        is_dir($entry) ? rmdir($entry) : (is_file($entry) && unlink($entry));
    }

    restore_error_handler();
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

it('throws when the destination cannot be written', function () {
    mkdir($this->directory . '/nested/foo.json', 0o755, true);

    Filesystem::store($this->directory . '/nested/foo.json', ['a' => 'b']);
})->throws(RuntimeException::class, 'Unable to write file');

it('throws when the directory cannot be created', function () {
    mkdir($this->directory . '/nested', 0o755, true);
    file_put_contents($this->directory . '/nested/foo.json', '');

    Filesystem::store($this->directory . '/nested/foo.json/bar.json', ['a' => 'b']);
})->throws(RuntimeException::class, 'Unable to create directory');
