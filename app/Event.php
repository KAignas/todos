<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App
 */
class Event extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'date', 'start', 'end', 'location', 'user_id', 'label_id', 'completed'];

    /**
     * Formatting short event title 80 chars
     * @return mixed|string
     */
    public function getShortTitleAttribute()
    {
        return strlen($this->title) > 80 ? substr($this->title, 0, 80).'...' : $this->title;
    }

    /**
     * @param $start
     * @return Carbon
     */
    public function getStartAttribute($start)
    {
        return Carbon::parse($this->date.' '.$start);
    }

    /**
     * @param $end
     * @return Carbon
     */
    public function getEndAttribute($end)
    {
        return Carbon::parse($this->date.' '.$end);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function label()
    {
        return $this->belongsTo('App\Label');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notification()
    {
        return $this->hasOne('App\Notification');
    }
}
