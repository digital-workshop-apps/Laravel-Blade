# Laravel Blade components

**PHP** ^8.0, **Laravel** ^9.0|^10.0

## About

---

With Laravel Blade components, you can create forms for Blade templates using the components of the package.

## Installation

---

```injectablephp
composer require dw-apps/laravel-blade
```

---

## Components

All components support Laravel session and standard HTML attributes.
If the control id attribute is not set, its value will be equal to the name attribute.

***All controls has attributes:***
* `uniq-id` - bool = false (Generate uniq id with prefix: 'control-')
* `valid-class` - bool = 'is-valid' 
* `invalid-class` - bool = 'is-invalid'

---

### Form
```html
<x-form method="put">
``` 
_Automatically sets the method and csrf. Supports all methods._

---

### Input
```html
<x-input name="control" list="datalist" uniq-id/>
```

---

### Datalist

```html
<x-datalist id="datalist" :source="$datalist"/>
```
_Attributes:_
* `source` - array (plain / associative)

---

### Error

```html
<x-error name="control"/>
```

_Attributes:_
* `name` - string **required**
* `dot-name` - bool = false

---

### Check
```html
<x-check/>
```

---

### Radio
```html
<x-radio/>
```

---

Select controls has attributes `placeholder` / `placeholder-disabled` (empty option), which takes a string type argument.
```html
<x-select placeholder="Select a value"/>
<x-select placeholder-disabled="Select a value"/>
```

### Select
```html
<x-select name="select" :source="$datalist"/>
<x-select name="select[]" :source="$datalist" multiple/>
```
_Attributes:_

* `source` - array (plain / associative)

_Support groups:_ 
```php
$datalist = [
    'Group label' => [
        'value-1' => 'Label 1',
        ...
    ]
];
```

---

### Select day
```html
<x-select-day/>
```
_Contains a list of localized names of days of the week with a range of values 0...6._

---

### Select month
```html
<x-select-month/>
```
_Contains a list of localized month names with a range of values 1...12._

---

### Select range
```html
<x-select-range start="a" end="z"/>
```
_Attributes:_
* `start` - string | int | float = 0
* `end` - string | int | float = 0
* `step` - int | float = 1

_See: https://www.php.net/manual/en/function.range.php_

---

### Select timezone
```html
<x-select-timezone/>
```
_Contains a list of timezones names._

---

### Select UTC
```html
<x-select-utc/>
```
_Contains a list of UTC zones names, with key / value pairs: '-12:00' => 'UTC−12:00' etc._

---

### Textarea
```html
<x-textarea/>
```

---
