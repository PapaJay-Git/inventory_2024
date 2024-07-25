<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'dafac_id',
        'family_member_name',
        'relationship_to_head',
        'age',
        'gender',
        'education',
        'occupational_skills',
        'remarks',
    ];

    public function dafac()
    {
        return $this->belongsTo(Dafac::class);
    }
}
