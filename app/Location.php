<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building', 'room',
    ];

    /**
     * Get the project for the location.
     */
    public function user(){
        $this->hasOne(Project::class, 'project_id');
    }
}
