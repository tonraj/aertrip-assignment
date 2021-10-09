<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'department_id'];

    function contacts(){
        return $this->hasMany(Contact::class);
    }

    function addresses(){
        return $this->hasMany(Address::class);
    }

    function department(){
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

}
