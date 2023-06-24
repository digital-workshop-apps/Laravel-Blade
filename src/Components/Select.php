<?php

namespace DWApps\Laravel\Blade\Components;

use DWApps\Laravel\Blade\Contracts\BaseComponent;
use DWApps\Laravel\Blade\Traits\ComponentBuilder;
use DWApps\Laravel\Blade\Traits\Selectable;
use Illuminate\View\Component;

class Select extends Component implements BaseComponent
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
        public string $autocomplete = 'off',
        public string $validClass   = 'is-valid',
        public string $invalidClass = 'is-invalid',
        public array $source        = [],
        public string|null $placeholder = null,
        public string|null $placeholderDisabled = null,
    ) {
        $this->fillAttributes();
    }

    public function defaultValueIsEmpty(): bool
    {
        return is_null($this->placeholder) && is_null($this->placeholderDisabled) && $this->valueIsEmpty();
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
                {{ $slot }}
                @foreach($source as $key => $val)
                    @if(is_array($val))
                    <optgroup label="{{ $key }}">
                        @foreach($val as $key => $val)
                            @if($loop->parent->first && $loop->first && $slot->isEmpty() && $defaultValueIsEmpty())
                                <option value="{{ $key }}" selected>{{ $val }}</option>
                            @else
                                <option value="{{ $key }}" {{ $selected($attributeSelected($key)) }}>{{ $val }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                    @else
                        @if($loop->first && $slot->isEmpty() && $defaultValueIsEmpty())
                            <option value="{{ $key }}" selected>{{ $val }}</option>
                        @else
                            <option value="{{ $key }}" {{ $selected($attributeSelected($key)) }}>{{ $val }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        blade;
    }
}
