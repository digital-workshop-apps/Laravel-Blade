<?php

namespace DWApps\Laravel\Blade\Components;

use DWApps\Laravel\Blade\Contracts\BaseComponent;
use DWApps\Laravel\Blade\Traits\ComponentBuilder;
use DWApps\Laravel\Blade\Traits\Selectable;
use Illuminate\View\Component;

class SelectRange extends Component implements BaseComponent
{
    use ComponentBuilder;
    use Selectable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public mixed $id    = null,
        public string $name = '',
        public mixed $value = null,
        public bool $uniqId = false,
        public string|int|float $start = 0,
        public string|int|float $end   = 0,
        public int|float $step         = 1,
        public string $autocomplete    = 'off',
        public string $validClass      = 'is-valid',
        public string $invalidClass    = 'is-invalid',
        public string|null $placeholder = null,
        public string|null $placeholderDisabled = null,
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
            <select {{
                $attributes
                    ->merge([
                        'id' => $falseIfEmpty($id),
                        'name' => $falseIfEmpty($name)
                    ])
                    ->class([
                        $invalidClass => $errors->has($dotName()),
                        $validClass => $errors->any() && !$errors->has($dotName()),
                    ])
            }}>
                @include('dwapps-blade-components::select-placeholder')
                @foreach(range($start, $end, $step) as $item)
                    <option value="{{ $item }}" {{ $selected($attributeSelected($item)) }}>{{ $item }}</option>
                @endforeach
            </select>
        blade;
    }
}
