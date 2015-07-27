# Output

### Format

`format` - The desired output format. If none is provided the format from the field configuration will be used. 

The format method returns the date/time in the format specified.

```
// Twig usage
{{ entry.example.format('y-m-d') }} or {{ entry.example.format }}

// API Usage
$entry->example->format('y-m-d'); or $entry->example->format;
```

### Local

`format` - The desired output format. If none is provided the format from the field configuration will be used. 

The local method returns the date/time in the format specified in the users specified timezone.

```
// Twig usage
{{ entry.example.local('y-m-d') }} or {{ entry.example.local }}

// API Usage
$entry->example->local('y-m-d'); or $entry->example->local;
```