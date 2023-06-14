<?php

namespace DWApps\Laravel\Blade\Traits;

use DateTimeInterface;
use Illuminate\Support\Carbon;

trait ComponentBuilder
{
    use Blade;

    public function valueIsEmpty(): bool
    {
        return in_array($this->value, [null, ''], true);
    }

    public function attributeId(): mixed
    {
        if ($this->uniqId) {
            return uniqid('control-');
        } elseif (is_null($this->id) && filled($this->name)) {
            return $this->name;
        }

        return $this->id;
    }

    public function attributeValue(): mixed
    {
        if (isset($this->type)) {
            if (! in_array($this->type, ['checkbox', 'radio'])) {
                $this->value = $this->old();
            }
            switch ($this->type) {
                case 'date':
                    return $this->attributeDateValue('Y-m-d');
                case 'datetime':
                    return $this->attributeDateValue(DateTimeInterface::ATOM);
                case 'datetime-local':
                    return $this->attributeDateValue('Y-m-d\TH:i');
                case 'time':
                    return $this->attributeDateValue('H:i');
                case 'week':
                    return $this->attributeDateValue('Y-\WW');
                default:
                    return $this->value;
            }
        }

        return $this->old();
    }

    protected function fillAttributes(): void
    {
        $this->id = $this->attributeId();
        $this->value = $this->attributeValue();
    }

    protected function attributeDateValue(string $format): mixed
    {
        if (empty($this->value)) {
            return $this->value;
        }
        if (! $this->value instanceof \DateTime) {
            $this->value = Carbon::make($this->value);
        }

        return $this->value->format($format);
    }
}
