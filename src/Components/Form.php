<?php

namespace DWApps\Laravel\Blade\Components;

use DWApps\Laravel\Blade\Traits\Blade;
use Illuminate\View\Component;

class Form extends Component
{
    use Blade;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public mixed $action = null,
        public mixed $method = null,
    ) {
        $this->method = strtolower($method);
    }

    public function attributeMethod(): null|string
    {
        if (! empty($this->method)) {
            return $this->method === 'get' ? 'get' : 'post';
        }

        return null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <form {{ $attributes->merge(['method' => $falseIfEmpty($attributeMethod()), 'action' => $falseIfEmpty($action)]) }}>
                @csrf
                @if(!in_array($method, ['get', 'post']) && !empty($method))
                    @method($method)
                @endif
                {{ $slot }}
            </form>
        blade;
    }
}
