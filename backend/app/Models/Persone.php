<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persone extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name'
    ];
    
    public function phones() {
        return $this->hasMany(Phone::class);
    }
}