<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherLocation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class,'id');
    }

    function scopeFilter($query, $filter)
    {
        $query->when($filter['region'] ?? false, function ($query, $region) {
            return $query->where('region_state', 'like', '%' . $region . '%');
        });

    }

}
