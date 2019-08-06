<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'section_id',
    ];

     public function components()
    {
            return $this->hasMany('App\Component');
    }

     public function course()
    {
            return $this->belongsTo('App\Course');
    }

	public function section()
    {
            return $this->belongsTo('App\Section');
    }

    public function site()
    {
            return $this->belongsTo('App\Site');
    }
    
    // public function artifacts()
    // {
    //         return $this->hasMany('App\Artifact');
    // }

    //  public function comments()
    // {
    //         return $this->hasManyThrough('App\Comment', 'App\Artifact');
    // }

}
