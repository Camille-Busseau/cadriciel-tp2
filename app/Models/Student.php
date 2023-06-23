<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'address', 'phone', 'bday', 'city_id'
    ];

    public function studentHasCity()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }

    public function studentHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'id');
    }

}
