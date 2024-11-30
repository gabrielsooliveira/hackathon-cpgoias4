<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name',
        'lat',
        'lng',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
