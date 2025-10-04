<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
    ];

    // Relasi ke user (many to many)
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }

    // Owner (kapten tim)
    public function owner()
    {
        return $this->belongsTo(\App\Models\User::class, 'owner_id');
    }
}
