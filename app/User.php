<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'phone_number',
        'blood',
        'location',
    ];

    /**
     * Get users by a specific blood group.
     *
     * @param     $query
     * @param     $blood
     * @param int $take
     *
     * @return mixed
     */
    public function scopeGetByBlood($query, $blood, $take = 5)
    {
        return $query->where('blood', $blood)->take($take)->get();
    }
}
