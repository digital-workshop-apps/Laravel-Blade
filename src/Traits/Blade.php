<?php

namespace DWApps\Laravel\Blade\Traits;

trait Blade
{
    public function falseIfEmpty(mixed $attribute): mixed
    {
        return blank($attribute) ? false : $attribute;
    }

    public function dotName(): string
    {
        return str_replace(['[]', '[', ']'], ['', '.', ''], $this->name);
    }

    protected function old(): mixed
    {
        return old($this->dotName(), $this->value);
    }
}
