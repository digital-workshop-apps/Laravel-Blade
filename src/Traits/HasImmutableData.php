<?php

namespace DWApps\Laravel\Blade\Traits;

use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

trait HasImmutableData
{
    public function getDays(): array
    {
        $days = [];
        $day = Carbon::now();
        $period = CarbonPeriod::create($day->startOf('week'), 7);
        foreach ($period as $key => $date) {
            $days[$key] = Str::ucfirst($date->translatedFormat('l'));
        }

        return $days;
    }

    public function getMonths(): array
    {
        $months = [];
        foreach (range(1, 12) as $index) {
            $date = Carbon::createFromFormat('!m', $index);
            $months[$index] = Str::ucfirst($date->translatedFormat('F'));
        }

        return $months;
    }

    public function getTimeZones(): array
    {
        $timeZones = data_get(\DateTimeZone::listAbbreviations(), '*.*.timezone_id');

        return Arr::sort(array_unique(Arr::where($timeZones, fn ($value, $key) => str_contains($value, '/'))));
    }

    public function getUTCZones(): array
    {
        return [
            '-12:00' => 'UTC−12:00',
            '-11:00' => 'UTC−11:00',
            '-10:00' => 'UTC−10:00',
            '-09:30' => 'UTC−09:30',
            '-09:00' => 'UTC−09:00',
            '-08:00' => 'UTC−08:00',
            '-07:00' => 'UTC−07:00',
            '-06:00' => 'UTC−06:00',
            '-05:00' => 'UTC−05:00',
            '-04:00' => 'UTC−04:00',
            '-03:30' => 'UTC−03:30',
            '-03:00' => 'UTC−03:00',
            '-02:00' => 'UTC−02:00',
            '-01:00' => 'UTC−01:00',
            '00:00'  => 'UTC±00:00',
            '+01:00' => 'UTC+01:00',
            '+02:00' => 'UTC+02:00',
            '+03:00' => 'UTC+03:00',
            '+03:30' => 'UTC+03:30',
            '+04:00' => 'UTC+04:00',
            '+04:30' => 'UTC+04:30',
            '+05:00' => 'UTC+05:00',
            '+05:30' => 'UTC+05:30',
            '+05:45' => 'UTC+05:45',
            '+06:00' => 'UTC+06:00',
            '+06:30' => 'UTC+06:30',
            '+07:00' => 'UTC+07:00',
            '+08:00' => 'UTC+08:00',
            '+08:45' => 'UTC+08:45',
            '+09:00' => 'UTC+09:00',
            '+09:30' => 'UTC+09:30',
            '+10:00' => 'UTC+10:00',
            '+10:30' => 'UTC+10:30',
            '+11:00' => 'UTC+11:00',
            '+12:00' => 'UTC+12:00',
            '+12:45' => 'UTC+12:45',
            '+13:00' => 'UTC+13:00',
            '+14:00' => 'UTC+14:00',
        ];
    }
}
