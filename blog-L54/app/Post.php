<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Core\Scopes\PostedScope;
use Carbon\Carbon;

class Post extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'author_id',
        'title',
        'content',
        'posted_at'
    ];

    public $dates = [ 'posted_at' ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PostedScope);
    }

    public function scopeLastMonth($query, $limit = 5)
    {
        return $query->whereBetween('posted_at', [Carbon::now()->subMonth(), Carbon::now()])
                     ->orderBy('posted_at', 'desc')
                     ->limit($limit);
    }

    public function scopeLastWeek($query)
    {
        return $query->whereBetween('posted_at', [Carbon::now()->subWeek(), Carbon::now()])
                     ->orderBy('posted_at', 'desc');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * return the excerpt of the post content
     *
     * @param  $length
     * @return string
     */
    public function excerpt($length = 50)
    {
        if (strlen($this->content) > $length) {
            return  substr($this->content, 0, $length) . '...';
        } else {
            return $this->content;
        }
    }
}
