<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building', 'room',
    ];

    /**
     * Get the user for the location.
     */
    public function user()
    {
        $this->hasOne(User::class);
    }
}
