<?php

namespace DWApps\Laravel\Blade\Providers;

use DWApps\Laravel\Blade\Components\Check;
use DWApps\Laravel\Blade\Components\Datalist;
use DWApps\Laravel\Blade\Components\Error;
use DWApps\Laravel\Blade\Components\Form;
use DWApps\Laravel\Blade\Components\Input;
use DWApps\Laravel\Blade\Components\Radio;
use DWApps\Laravel\Blade\Components\Select;
use DWApps\Laravel\Blade\Components\SelectDay;
use DWApps\Laravel\Blade\Components\SelectMonth;
use DWApps\Laravel\Blade\Components\SelectRange;
use DWApps\Laravel\Blade\Components\SelectTimeZone;
use DWApps\Laravel\Blade\Components\SelectUTC;
use DWApps\Laravel\Blade\Components\Textarea;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('checked', function ($expression) {
            return "<?php echo (bool)$expression ? 'checked' : ''; ?>";
        });
        Blade::directive('selected', function ($expression) {
            return "<?php echo (bool)$expression ? 'selected' : ''; ?>";
        });
        Blade::directive('disabled', function ($expression) {
            return "<?php echo (bool)$expression ? 'disabled' : ''; ?>";
        });
        Blade::directive('readonly', function ($expression) {
            return "<?php echo (bool)$expression ? 'readonly' : ''; ?>";
        });
        Blade::directive('required', function ($expression) {
            return "<?php echo (bool)$expression ? 'required' : ''; ?>";
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dwapps-blade-components');
        Blade::components([
            Check::class          => 'check',
            Datalist::class       => 'datalist',
            Error::class          => 'error',
            Form::class           => 'form',
            Input::class          => 'input',
            Radio::class          => 'radio',
            Select::class         => 'select',
            SelectDay::class      => 'select-day',
            SelectMonth::class    => 'select-month',
            SelectRange::class    => 'select-range',
            SelectTimeZone::class => 'select-timezone',
            SelectUTC::class      => 'select-utc',
            Textarea::class       => 'textarea',
        ]);
    }
}
