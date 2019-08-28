<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number', 'description',
    ];

    /**
     * Get the user for the location.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
