# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You can set the datetime field type value with a timestamp.

{{ code('php', '$entry->example = date("U");') }}

You can also use any string interpretable by the `strtotime` method.

{{ code('php', '$entry->example = "now";') }}

Lastly, you can also set the value with an instance of `Carbon`.

{{ code('php', '$entry->example = new Carbon;') }}

<hr>

<a name="output"></a>
## Basic Output

The datetime field type returns `null` or an instance of `Carbon` in the configured timezone.

{% code php %}
$entry->example->format('l jS \\of F Y h:i:s A'); // Thursday 25th of December 1975 02:15:16 PM;
{% endcode %}

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the country field type presenter is returned instead.

#### Format

Returns the datetime in the configured format. An optional format pattern can also be passed as an argument.

{% code php %}
$entry->example->format();            // Friday, 10 July, 2015 2:30 AM
$entry->example->format("m/d/Y H:I"); // 07/10/2015 14:30
{% endcode %}

#### Format (Date Only)

Returns only the date portion in the configured format. An optional format pattern can also be passed as an argument.

{% code php %}
$entry->example->date();        // Friday, 10 July, 2015
$entry->example->date("m/d/Y"); // 07/10/2015
{% endcode %}

#### Format (Time Only)

Returns only the time portion in the configured format. An optional format pattern can also be passed as an argument.

{% code php %}
$entry->example->time();      // 2:30 AM
$entry->example->time("H:I"); // 14:30
{% endcode %}

#### Local

Returns the datetime in the active timezone. An optional format pattern can also be passed as an argument.

<div class="alert alert-primary">
<strong>Note:</strong> Laravel's timezone is determined by the value of <strong>config("app.timezone")</strong>
</div>

{% code php %}
$entry->example->local();            // Friday, 10 July, 2015 4:30 AM
$entry->example->local("m/d/Y H:I"); // 07/10/2015 16:30
{% endcode %}

#### Time Elapsed

Returns the human readable time elapsed since the datetime value.

{% code php %}
$entry->example->timeAgo(); // 3 weeks ago
{% endcode %}

#### ISO Format

Returns the datetime in ISO 8601 format.

{% code php %}
$entry->example->iso(); // 2004-02-12T15:19:21+00:00
{% endcode %}

#### RFC Format

Returns the datetime in RFC 2822 format.

{% code php %}
$entry->example->rfc(); // Thu, 21 Dec 2000 16:01:07 +0200
{% endcode %}