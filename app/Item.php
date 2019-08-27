<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'serialcode', 'note',
    ];

    /**
     * Get the user from the item.
     */
    public function user(){
        $this->hasOne(User::class, 'user_id');
    }
}
