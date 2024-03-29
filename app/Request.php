<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';

    protected $fillable = [
        'description', 'status', 'user_id',
    ];

    /**
     * Get the user from the request.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
