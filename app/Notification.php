<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * @package App
 */
class Notification extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['event_id', 'type', 'time'];
    /**
     * @var array
     */
    public static $types = ['email', 'sms'];
    /**
     * Time in minutes
     * @var array
     */
    public static $times = [
        '10 minutes' => 10,
        '20 minutes' => 20,
        '1 hour' => 60,
        '1 day' => 1440
    ];
}
