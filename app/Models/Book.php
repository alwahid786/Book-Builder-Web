<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar_fname',
        'avatar_lname',
        'avatar_description',
        'user_id'
    ];

    public function outlines(){
        return $this->hasMany(Outline::class, 'user_id', 'user_id');
    }

    public function copyright(){
        return $this->hasOne(Copyright::class, 'user_id', 'user_id');
    }
}
