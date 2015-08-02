# Datetime Field Type

- [Introduction](#introduction)
- [Configuration](#configuration)
- [Output](#output)


<a name="introduction"></a>
## Introduction

`anomaly.field_type.datetime`

The datetime field type provides a date and/or time picker input.

### Notes

- Date and time inputs are displayed in the desired timezone as indicated by the input and field configuration.
- Date and time values are adjusted from their input timezone to UTC for storage are adjusted back to the desired timezone when retrieved as configured.


<a name="configuration"></a>
## Configuration

**Example Definition:**

    protected $fields = [
        'example' => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'mode'        => 'datetime',
                'timezone'    => 'default',
                'date_format' => 'j F, Y',
                'year_range'  => '-50:+50',
                'time_format' => 'g:i A',
                'step'        => 15
            ]
        ]
    ];

### `mode`

The field input mode. Valid options are **datetime**, **date**, or **time**. The default value is **datetime**.

### `timezone`

The input timezone. Any valid [PHP timezone](http://php.net/manual/en/timezones.php) can be used. The default timezone of your application will be used by default.

**NOTE:** When setting a date via the API like `$entry->example = (new Carbon())->now()`, the timezone adjustment will still occur.

### `date_format`

The date input format. Any valid [PHP date format](http://php.net/manual/en/function.date.php) can be used. `'j F, Y'` is the default value.

This configuration also applies to the default output format. 

### `year_range`

The default year range of the datepicker's year dropdown. `'-50:+50'` is the default value.
   
### `time_format`

The date input format. Any valid [PHP date format](http://php.net/manual/en/function.date.php) can be used. `'g:i A'` is the default value.

This configuration also applies to the default output format. 

### `step`

The number of minutes between each option for the timepicker input. `15` is the default value.


<a name="output"></a>
## Output

This field type returns a Carbon instance in the configured timezone by default.

### `format($format = null)`

`$format` - The desired output format. If none is provided the format from the field configuration will be used. 

Returns the date/time value in the provided optional format.

    // Twig usage
    {{ entry.example.format('y-m-d') }} or {{ entry.example.format }}
    
    // API usage
    $entry->example->format('y-m-d'); or $entry->example->format;

### `local($format = null)`

`$format` - The desired output format. If none is provided the format from the field configuration will be used. 

Returns the date/time value in the provided optional format in the **user's specified timezone**.

    // Twig usage
    {{ entry.example.local('y-m-d') }} or {{ entry.example.local }}
    
    // API usage
    $entry->example->local('y-m-d'); or $entry->example->local;

### `iso()`

Returns the date/time value in the ISO format. Great for the HTML5 datetime elment.

    // Twig usage
    {{ entry.example.iso }}
    
    // HTML5 usage
    <time datetime="{{ entry.example.iso }}">{{ entry.example.local }}</time>
    
    // API usage
    $entry->example->iso