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
     * Get the users for the project.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
