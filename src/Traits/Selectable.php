<?php

namespace DWApps\Laravel\Blade\Traits;

trait Selectable
{
    public function attributeSelected($option): bool
    {
        if (is_array($this->value)) {
            return in_array($option, $this->value);
        }

        return is_numeric($option) ? (string)$option === (string)$this->value : $option == $this->value;
    }

    public function disabled(bool $value): string
    {
        return $value ? 'disabled' : '';
    }

    public function selected(bool $value): string
    {
        return $value ? 'selected' : '';
    }
}
