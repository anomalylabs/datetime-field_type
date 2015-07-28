# Output

This field type returns a Carbon instance in the configured timezone by default.

### Format

`format` - The desired output format. If none is provided the format from the field configuration will be used. 

The format method returns the date/time value in the provided optional format.

```
// Twig usage
{{ entry.example.format('y-m-d') }} or {{ entry.example.format }}

// API usage
$entry->example->format('y-m-d'); or $entry->example->format;
```

### Local

`format` - The desired output format. If none is provided the format from the field configuration will be used. 

The local method returns the date/time value in the provided optional format in the **users specified timezone**.

```
// Twig usage
{{ entry.example.local('y-m-d') }} or {{ entry.example.local }}

// API usage
$entry->example->local('y-m-d'); or $entry->example->local;
```