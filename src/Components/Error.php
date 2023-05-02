<?php

namespace DWApps\Laravel\Blade\Components;

use DWApps\Laravel\Blade\Traits\Blade;
use Illuminate\View\Component;

class Error extends Component
{
    use Blade;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $name, public bool $dotName = false)
    {
        if ($this->dotName) {
            $this->name = $this->dotName();
        }
        else {
            $this->name = str_replace('.', '_', $this->name);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            @error($name)
                <ul {{ $attributes }}>
                    @foreach ($errors->get($name) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @enderror
        blade;
    }
}
