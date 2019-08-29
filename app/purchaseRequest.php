<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchaseRequest extends Model
{
    protected $table = 'purchase_request';

    protected $fillable = [
        'name', 'status', 'description', 'price', 'quantity', 'user_id',
    ];

    /**
     * Get the user from the request.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
