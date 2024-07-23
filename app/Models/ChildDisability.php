<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildDisability extends Model
{
    use HasFactory;

    protected $fillable = [
        'daycare_id',
        'disability',
        'cause',
    ];

    public function daycare()
    {
        return $this->belongsTo(Daycare::class);
    }
}
