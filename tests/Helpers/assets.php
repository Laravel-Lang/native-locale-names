<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;

expect()->extend('toBeNotEmpty', function () {
    Assert::assertNotEmpty($this->value);

    return $this;
});
