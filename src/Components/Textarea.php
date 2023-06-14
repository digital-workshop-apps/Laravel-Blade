<?php

namespace DWApps\Laravel\Blade\Components;

use DWApps\Laravel\Blade\Contracts\BaseComponent;
use DWApps\Laravel\Blade\Traits\ComponentBuilder;
use Illuminate\View\Component;

class Textarea extends Component implements BaseComponent
{
    use ComponentBuilder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public mixed $id = null,
        public string $name = '',
        public mixed $value = null,
        public bool $uniqId = false,
        public string $autocomplete = 'off',
        public string $validClass   = 'is-valid',
        public string $invalidClass = 'is-invalid',
    ) {
        $this->fillAttributes();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <textarea {{ $attributes->merge([
                'id'    => $falseIfEmpty($id),
                'name'  => $falseIfEmpty($name),
                'autocomplete' => $autocomplete,
            ])
            ->class([$invalidClass => $errors->has($dotName())])
        }}>{{ (string)$value }}</textarea>
        blade;
    }
}
