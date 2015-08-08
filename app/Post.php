<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 */
class Post extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'published_at'
    ];

    /**
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get Tags associated with Post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongstoMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current post.
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
}
