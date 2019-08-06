<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * An artifact was created by a user. 
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * An artifact may have been created as an assignment for a section. 
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * An artifact may have been created as an assignment for a section. 
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * An artifact may belong to many collections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function collections()
    {
        return $this->belongsToMany(Collection::class)->withPivot('position','description','dimensions_height','dimensions_width','dimensions_depth','dimensions_units');
    }

    /**
     * An artifact may have many comments posted to it. 
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
        		    ->whereNull('parent_id');
    }

}
