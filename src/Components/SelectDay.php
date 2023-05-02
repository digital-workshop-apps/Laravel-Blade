<?php

namespace DWApps\Laravel\Blade\Components;

use DWApps\Laravel\Blade\Contracts\BaseComponent;
use DWApps\Laravel\Blade\Traits\ComponentBuilder;
use DWApps\Laravel\Blade\Traits\HasImmutableData;
use DWApps\Laravel\Blade\Traits\Selectable;
use Illuminate\View\Component;
use Illuminate\View\View;

class SelectDay extends Component implements BaseComponent
{
    use ComponentBuilder;
    use Selectable;
    use HasImmutableData;

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
        public string|null $placeholder = null,
        public string|null $placeholderDisabled = null,
    ) {
        $this->fillAttributes();
    }

    public function render(): View
    {
        return view('dwapps-blade-components::select-assoc', [
            'source' => $this->getDays()
        ]);
    }
}
