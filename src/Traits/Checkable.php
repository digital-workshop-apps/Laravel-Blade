<?php

namespace DWApps\Laravel\Blade\Traits;

trait Checkable
{
    public function oldEmpty(): bool
    {
        return blank(old($this->dotName()));
    }

    public function sessionEmpty(): bool
    {
        return is_null(data_get(session()->all(), '_old_input'));
    }

    public function radioChecked(): bool
    {
        if ($this->sessionEmpty()) {
            return $this->checked;
        }
        if ($this->oldEmpty()) {
            return false;
        } else {
            return old($this->dotName()) == $this->value;
        }
    }

    public function checkboxChecked(): bool
    {
        if ($this->sessionEmpty()) {
            return $this->checked;
        }
        if ($this->oldEmpty()) {
            return false;
        } else {
            return old($this->dotName());
        }
    }

    public function checked(): bool
    {
        if ($this->type === 'radio') {
            return $this->radioChecked();
        } elseif($this->type === 'checkbox') {
            return $this->checkboxChecked();
        }

        return false;
    }
}
