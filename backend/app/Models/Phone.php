<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'persone_id',
        'phone',
    ];
    public function persone() {
        return $this->belongsTo(Persone::class);
    }
}