<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'serialcode', 'note', 'user_id',
    ];

    /**
     * Get the user from the item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
