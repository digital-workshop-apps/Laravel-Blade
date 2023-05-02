<?php

namespace DWApps\Laravel\Blade\Components;

use Illuminate\View\Component;

class Datalist extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public array $source = [],
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <datalist {{ $attributes }}>
            @if(Arr::isAssoc($source))
                @foreach($source as $val => $text)
                    <option value="{{ $val }}">{{ $text }}</option>
                @endforeach
            @else
                @foreach($source as $item)
                    <option value="{{ $item }}">
                @endforeach
            @endif
            </datalist>
        blade;
    }
}
