<?php

namespace DWApps\Laravel\Blade\Components;

use DWApps\Laravel\Blade\Contracts\BaseComponent;
use DWApps\Laravel\Blade\Traits\ComponentBuilder;
use DWApps\Laravel\Blade\Traits\Checkable;
use Illuminate\View\Component;
use Illuminate\View\View;

class Input extends Component implements BaseComponent
{
    use ComponentBuilder;
    use Checkable;

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
        public string $validClass   = 'is-valid',
        public string $invalidClass = 'is-invalid',
        public string $type         = 'text',
        public bool|null $checked   = false,
    ) {
        $this->checked = (bool)$checked;
        $this->fillAttributes();
    }

    public function render(): View
    {
        return view('dwapps-blade-components::input');
    }
}
