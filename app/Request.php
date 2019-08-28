<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
    ];

    /**
     * Get the user from the request.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
