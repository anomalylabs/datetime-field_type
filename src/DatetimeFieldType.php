<?php namespace Anomaly\Streams\Addon\FieldType\Datetime;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class DatetimeFieldType extends FieldTypeAddon
{
    protected $slug = 'datetime';

    /**
     * The database column type this field type uses.
     *
     * @var string
     */
    public $columnType = 'datetime';

    /**
     * Field type version
     *
     * @var string
     */
    public $version = '1.1.0';

    /**
     * Field type author information.
     *
     * @var array
     */
    public $author = array(
        'name' => 'AI Web Systems, Inc.',
        'url'  => 'http://aiwebsystems.com/',
    );
}
