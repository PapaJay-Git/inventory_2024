<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildEccdExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'daycare_id',
        'service_type',
        'service',
        'from_date',
        'to_date',
    ];

    public function daycare()
    {
        return $this->belongsTo(Daycare::class);
    }
}
