<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class borrowRequest extends Model
{
    protected $fillable = [
        'name', 'status', 'description', 'borrowedFrom', 'quantity', 'status', 'user_id',
    ];

    /**
     * Get the user from the request.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
