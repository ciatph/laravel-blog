<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    protected $fillable = ['title', 'body'];

    /** Find the Comments that belong to this Post, N:1 (many is to one) */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function tags()
    {
        // Any post may have many tags
        return $this->belongsToMany(Tag::class);
    }


    public function addComment($body)
    {
        /** Method #2: save() in Post mode. See CommentsController, Method #2 */
        /*
        Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);
        */

        /** Method #3: Use relationship! */
        $this->comments()->create(compact('body'));
    }


    /** Used in conjunction with PostController::index filter() method */
    public function scopeFilter($query, $filters)
    {
        if(count($filters)) {
            if($month = $filters['month']) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if($year = $filters['year']) {
                $query->whereYear('created_at', $year);
            }                 
        }       
    }


    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();        
    }
}
