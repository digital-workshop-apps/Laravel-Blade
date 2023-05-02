<?php

namespace DWApps\Laravel\Blade\Contracts;

interface BaseComponent
{
    public function __construct(
        mixed $id    = null,
        string $name = '',
        mixed $value = null,
        bool $uniqId = false,
        string $validClass   = 'is-valid',
        string $invalidClass = 'is-invalid',
    );
}
