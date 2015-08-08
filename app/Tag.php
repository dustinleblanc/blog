<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @package App
 */
class Tag extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get all the posts tagged with this tag.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

}
